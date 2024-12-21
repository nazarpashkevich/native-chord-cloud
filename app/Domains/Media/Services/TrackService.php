<?php

namespace App\Domains\Media\Services;

use App\Domains\Media\Data\UploadTrackData;
use App\Domains\Media\Models\UploadedTrack;
use Illuminate\Pagination\LengthAwarePaginator;

class TrackService
{

    public function upload(UploadTrackData $data): UploadedTrack
    {
        $track = $data->toModel();
        $track->save();

        return $track;
    }

    public function uploadedTracks(): LengthAwarePaginator
    {
        return UploadedTrack::query()
            ->paginate();
    }
}
