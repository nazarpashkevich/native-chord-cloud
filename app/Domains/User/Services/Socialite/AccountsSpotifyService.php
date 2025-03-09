<?php

namespace App\Domains\User\Services\Socialite;

use App\Domains\User\Factories\Socialite\SpotifyAccountFactory;
use App\Domains\User\Models\SocialAccount;
use App\Domains\User\Models\User;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AccountsSpotifyService
{
    const USER_SCOPE = 'app-remote-control streaming playlist-read-private user-top-read user-library-read
    user-read-private';

    public function __construct(protected string $baseUrl, protected string $clientId, protected string $clientSecret)
    {
    }

    public function authorizeLink(User $user): string
    {
        $state = $this->generateState();

        return "{$this->baseUrl}/authorize?" . http_build_query([
                'response_type' => 'code',
                'client_id'     => config('services.spotify.client_id'),
                'scope'         => static::USER_SCOPE,
                'redirect_uri'  => $this->makeCallbackUrl(),
                'state'         => $state,
            ]);
    }

    protected function generateState(): string
    {
        return Str::uuid();
    }

    protected function makeCallbackUrl(): string
    {
        return 'http://localhost:3000' . route('profile.connect.spotify.callback', absolute: false); // @todo;
    }

    public function accessToken(string $code): SocialAccount
    {
        $response = Http::asForm()
            ->withHeaders([
                'Authorization' => 'Basic ' . base64_encode("{$this->clientId}:{$this->clientSecret}"),
            ])
            ->post("{$this->baseUrl}/api/token", [
                'code'         => $code,
                'redirect_uri' => $this->makeCallbackUrl(),
                'grant_type'   => 'authorization_code',
            ]);

        if ($response->successful()) {
            $data = $response->json();

            return SpotifyAccountFactory::make($data['access_token'], $data['refresh_token'], $data['expires_in']);
        }

        throw new RequestException($response);
    }

    public function refreshToken(string $refreshToken): SocialAccount
    {
        $response = Http::asForm()
            ->withHeaders([
                'Authorization' => 'Basic ' . base64_encode("{$this->clientId}:{$this->clientSecret}"),
            ])
            ->post("{$this->baseUrl}/api/token", [
                'refresh_token' => $refreshToken,
                'grant_type'    => 'refresh_token',
            ]);

        if ($response->successful()) {
            $data = $response->json();

            return SpotifyAccountFactory::make($data['access_token'], $data['refresh_token'] ?? $refreshToken, $data['expires_in']);
        }

        throw new RequestException($response);
    }

}
