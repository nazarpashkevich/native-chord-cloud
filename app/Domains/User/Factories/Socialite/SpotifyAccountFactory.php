<?php

namespace App\Domains\User\Factories\Socialite;

use App\Domains\Spotify\Services\SpotifyService;
use App\Domains\User\Enums\SocialiteProvider;
use App\Domains\User\Models\SocialAccount;

class SpotifyAccountFactory
{
    protected SpotifyService $service;

    private function __construct(
        protected string $accessToken,
        protected string $refreshToken,
        protected int $expiresIn
    ) {
        $this->service = app(SpotifyService::class);
    }

    public static function make(string $accessToken, string $refreshToken, int $expiresIn): SocialAccount
    {
        return (new static($accessToken, $refreshToken, $expiresIn))->handle();
    }

    protected function handle(): SocialAccount
    {
        $account = SocialAccount::query()->where('provider', SocialiteProvider::Spotify)->firstOrNew();
        $account->fill([
            'provider'      => SocialiteProvider::Spotify,
            'access_token'  => $this->accessToken,
            'refresh_token' => $this->refreshToken,
            'expires_in'    => $this->expiresIn,
        ]);

        // get user data from 3d part
        $this->fillAccountData($account);

        $account->save();

        return $account;
    }

    protected function fillAccountData(SocialAccount $account): void
    {
        $this->service->client->client->withToken($this->accessToken);
        $spotifyAccount = $this->service->me();

        $account->fill([
            'external_id' => $spotifyAccount->id,
            'name'        => $spotifyAccount->display_name,
        ]);
    }
}
