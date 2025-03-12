<?php

namespace App\Domains\Spotify\ApiClients;

use App\Domains\Common\Facades\AuthFacade;
use App\Domains\User\Enums\SocialiteProvider;
use App\Domains\User\Services\Socialite\AccountsSpotifyService;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class SpotifyApiClient
{
    public function __construct(
        public PendingRequest $client,
        protected AccountsSpotifyService $accountsService
    ) {
        $this->client->retry(2)
            ->throw(
                fn (Response $response, RequestException $request) => $this->handleRequestError(
                    $response,
                    $request
                )
            );
    }

    protected function handleRequestError(Response $response, RequestException $exception): bool
    {
        if ($response->status() === 401) {
            Log::info('Updating token...');
            $account = AuthFacade::socialite(SocialiteProvider::Spotify);
            $this->accountsService->refreshToken($account->refresh_token);
        }

        return true;
    }

    public function get(string $url, $query = null): Response
    {
        return $this->client->get($url, $query);
    }

    public function post(string $url, $data = []): Response
    {
        return $this->client->post($url, $data);
    }
}
