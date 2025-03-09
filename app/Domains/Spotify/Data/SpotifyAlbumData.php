<?php

namespace App\Domains\Spotify\Data;

use Spatie\LaravelData\Data;

class SpotifyAlbumData extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly string $href,
        public readonly array $images,
        public readonly string $name,
        public readonly int $total_tracks,
    )
    {}
}
