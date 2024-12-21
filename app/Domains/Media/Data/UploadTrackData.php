<?php

namespace App\Domains\Media\Data;

use App\Domains\Media\Models\UploadedTrack;
use Spatie\LaravelData\Data;

class UploadTrackData extends Data
{
    public function __construct(
        public readonly string $title,
        public readonly string $author,
        public readonly string $album,
        public readonly string $playtime,
        public readonly string $path,
    ) {
    }

    public function toModel(null|int|UploadedTrack $track = null): UploadedTrack
    {
        if (is_int($track)) {
            $track = UploadedTrack::query()->find($track);
        }

        $track ??= new UploadedTrack();

        $track->fill([
            'title'    => $this->title,
            'author'   => $this->author,
            'album'    => $this->album,
            'playtime' => $this->playtime,
            'path'     => $this->path,
        ]);

        return $track;
    }
}
