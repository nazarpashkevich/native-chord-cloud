<?php

namespace App\Providers;

use App\Domains\Common\Facades\AuthFacade;
use App\Domains\Spotify\ApiClients\SpotifyApiClient;
use App\Domains\User\Enums\SocialiteProvider;
use App\Domains\User\Services\Socialite\AccountsSpotifyService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AccountsSpotifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AccountsSpotifyService::class, function ($app) {
            return new AccountsSpotifyService(
                config('services.spotify.accounts_url'),
                config('services.spotify.client_id'),
                config('services.spotify.client_secret')
            );
        });

        $this->app->singleton(SpotifyApiClient::class, function ($app) {
            return new SpotifyApiClient(
                Http::withOptions(['verify' => app()->isProduction()])
                    ->withToken(
                        AuthFacade::socialite(SocialiteProvider::Spotify)?->access_token ?? ''
                    )
                    ->baseUrl(config('services.spotify.api_url')),
                app(AccountsSpotifyService::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
