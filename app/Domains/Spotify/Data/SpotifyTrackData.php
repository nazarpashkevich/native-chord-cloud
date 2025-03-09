<?php

namespace App\Domains\Spotify\Data;

use App\Domains\Media\Data\UploadedTrackData;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

class SpotifyTrackData extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $uri,
        public readonly string $duration_ms,
        public readonly string $href,
        public readonly SpotifyAlbumData $album,
        public readonly array $artists,
    )
    {}

    public function toMediaTrack(): UploadedTrackData
    {
        return new UploadedTrackData(
            $this->name,
            implode(', ', Arr::pluck($this->artists, 'name')),
            $this->album->name,
            $this->duration_ms / 1000,
            $this->href,
            $this->id
        );
    }
}
