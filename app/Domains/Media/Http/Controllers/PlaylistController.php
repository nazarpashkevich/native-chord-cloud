<?php

namespace App\Domains\Media\Http\Controllers;

use App\Domains\Common\Http\Controllers\Controller;
use App\Domains\Media\Models\Playlist;
use Inertia\Inertia;
use Inertia\Response;

class PlaylistController extends Controller
{
    public function show(Playlist $playlist): Response
    {
        return Inertia::render('Media/Playlists/Show', [
            'playlist' => $playlist,
        ]);
    }
}
