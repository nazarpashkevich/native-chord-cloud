<?php

namespace App\Domains\Spotify\Services;

use App\Domains\Spotify\ApiClients\SpotifyApiClient;
use App\Domains\Spotify\Data\SpotifyPlaylistData;
use App\Domains\Spotify\Data\SpotifyProfileData;
use App\Domains\Spotify\Data\SpotifyTrackData;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SpotifyService
{
    public function __construct(public SpotifyApiClient $client)
    {
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
    public function userPlaylists(bool $force = true): Collection
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
            Arr::map($response->json()['items'], fn ($item) => $item['track']), Collection::class
        );
    }

    public function playlist(string $id): SpotifyPlaylistData
    {
        $response = $this->client->get("playlists/$id");

        return SpotifyPlaylistData::from($response->json());
    }
}
