<?php

namespace App\Domains\Media\Data;

use App\Domains\Common\Data\BaseData;
use App\Domains\Media\Models\Track;

class TrackData extends BaseData
{
    public function __construct(
        public readonly string $title,
        public readonly string $author,
        public readonly string $album,
        public readonly string $playtime,
        public readonly string $path,
        public readonly ?string $playlistId = null,
    ) {
    }

    public function toModel(null|int|Track $track = null): Track
    {
        if (is_int($track)) {
            $track = Track::query()->find($track);
        }

        $track ??= new Track();

        $track->fill([
            'title'    => $this->title,
            'author'   => $this->author,
            'album'    => $this->album,
            'playtime' => $this->playtime,
            'path'     => $this->path,
        ]);

        if ($this->playlistId) {
            $track->playlist()->associate($this->playlistId);
        }

        return $track;
    }
}
