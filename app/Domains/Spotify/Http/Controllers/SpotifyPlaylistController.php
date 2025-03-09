<?php

namespace App\Domains\Spotify\Http\Controllers;

use App\Domains\Common\Http\Controllers\Controller;
use App\Domains\Spotify\Data\SpotifyTrackData;
use App\Domains\Spotify\Services\SpotifyService;
use Inertia\Inertia;
use Inertia\Response;

class SpotifyPlaylistController extends Controller
{
    public function __construct(protected SpotifyService $service)
    {
    }

    public function show(string $id): Response
    {
        $playlist = $this->service->playlist($id);
        $tracks = $this->service->playlistTracks($playlist);

        return Inertia::render('Media/Playlists/Show', [
            'playlist' => $playlist->toMediaPlaylist(),
            'tracks' => $tracks->map(fn(SpotifyTrackData $track) => $track->toMediaTrack()),
        ]);
    }
}
