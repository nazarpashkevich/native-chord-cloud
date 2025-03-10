<?php

namespace App\Domains\Media\Http\Controllers;

use App\Domains\Common\Http\Controllers\Controller;
use App\Domains\Media\Data\PlaylistData;
use App\Domains\Media\Data\TrackData;
use App\Domains\Media\Http\Requests\PlaylistRequest;
use App\Domains\Media\Models\Playlist;
use App\Domains\Media\Services\PlaylistService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PlaylistController extends Controller
{
    public function __construct(protected PlaylistService $service)
    {
    }

    public function show(Playlist $playlist): Response
    {
        $playlist->load('tracks');

        return Inertia::render('Media/Playlists/Show', [
            'playlist' => PlaylistData::from($playlist),
            'tracks' => TrackData::collect($playlist->tracks),
        ]);
    }
    public function store(PlaylistRequest $request): RedirectResponse
    {
        $this->service->create($request->toData());

        return back();
    }
}
