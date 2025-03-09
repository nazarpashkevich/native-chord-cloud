<?php

namespace App\Domains\Spotify\Services;

use App\Domains\Common\Facades\AuthFacade;
use App\Domains\Spotify\Data\SpotifyPlaylistData;
use App\Domains\Spotify\Data\SpotifyProfileData;
use App\Domains\Spotify\Data\SpotifyTrackData;
use App\Domains\User\Enums\SocialiteProvider;
use App\Domains\User\Services\Socialite\AccountsSpotifyService;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SpotifyService
{
    public function __construct(public PendingRequest $client, protected AccountsSpotifyService $accountsService)
    {
        $this->client->throw(
            fn (Response $response, RequestException $request) => $this->handleRequestError($response, $request));
    }

    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    protected function handleRequestError(Response $response, RequestException $exception): bool
   {
       if ($response->status() === 401) {
           $account = AuthFacade::socialite(SocialiteProvider::Spotify);
           $this->accountsService->refreshToken($account->refresh_token);

           // @todo
           return true;
       }

       throw new RequestException($response);
   }

   public function me(): SpotifyProfileData
   {
        $response = $this->client->get('me');

        return SpotifyProfileData::from($response->json());
   }

    /**
     * @return \Illuminate\Support\Collection<SpotifyPlaylistData>
     * @throws \Illuminate\Http\Client\ConnectionException
     */
   public function userPlaylists(bool $force = false): Collection
   {
       // caching for better performance
       $cacheKey = 'spotify_user_playlists';
       $cacheTimeMinutes = 30; // @todo move to config

       if (!$force && Cache::has($cacheKey)) {
           return Cache::get($cacheKey);
       }

        $response = $this->client->get('me/playlists');

       $playlists = SpotifyPlaylistData::collect($response->json()['items'], Collection::class);

       Cache::put($cacheKey, $playlists, now()->addMinutes($cacheTimeMinutes));

       return $playlists;
   }

    /**
     * @return \Illuminate\Support\Collection<SpotifyTrackData>
     * @throws \Illuminate\Http\Client\ConnectionException
     */
   public function playlistTracks(SpotifyPlaylistData $playlist): Collection
   {
        $response = $this->client->get($playlist->tracks->href);

        return SpotifyTrackData::collect(
            Arr::map($response->json()['items'], fn($item) => $item['track']), Collection::class
        );
   }
}
