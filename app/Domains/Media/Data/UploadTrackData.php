<?php

namespace App\Domains\Media\Data;

use App\Domains\Media\Models\UploadedTrack;
use getID3;
use Spatie\LaravelData\Data;

class UploadTrackData extends Data
{
    public function __construct(
        public readonly string $track
    ) {
    }

    public function toModel(null|int|UploadedTrack $track = null): UploadedTrack
    {
        if (is_int($track)) {
            $track = UploadedTrack::query()->find($track);
        }

        $track ??= new UploadedTrack();

        $getID3 = new getID3();
        $fileInfo = $getID3->analyze($this->track);

        $track->fill([
            'title'    => $fileInfo['filename'],
            'author'   => $fileInfo['tags']['id3v2']['artist'][0] ?? '',
            'album'    => $fileInfo['tags']['id3v2']['album'][0] ?? '',
            'playtime' => $fileInfo['playtime_seconds'] ?? 0,
            'path'     => $this->track,
        ]);

        return $track;
    }
}
