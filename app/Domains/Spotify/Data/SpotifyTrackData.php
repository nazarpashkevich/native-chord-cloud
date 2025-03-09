<?php

namespace App\Domains\Spotify\Data;

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
}
