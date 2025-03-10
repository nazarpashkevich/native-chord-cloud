<?php

namespace App\Domains\Media\Services;

use App\Domains\Media\Data\PlaylistData;
use App\Domains\Media\Models\Playlist;
use Illuminate\Support\Collection;

class PlaylistService
{

    /**
     * @throws \Exception
     */
    public function create(PlaylistData $data): Playlist
    {
        $playlist = $data->toModel();
        $playlist->save();

        return $playlist;
    }

    public function list(?Collection $filters = null): Collection
    {
        return Playlist::query()
            ->get();
    }

}
