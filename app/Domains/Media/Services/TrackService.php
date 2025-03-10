<?php

namespace App\Domains\Media\Services;

use App\Domains\Media\Data\TrackData;
use App\Domains\Media\Models\Track;
use Illuminate\Pagination\LengthAwarePaginator;

class TrackService
{

    public function upload(TrackData $data): Track
    {
        $track = $data->toModel();
        $track->save();

        return $track;
    }

    public function list(): LengthAwarePaginator
    {
        return Track::query()
            ->paginate();
    }


    public function localList():  LengthAwarePaginator
    {
        return Track::query()
            ->whereNull('playlist_id')
            ->paginate();
    }
}
