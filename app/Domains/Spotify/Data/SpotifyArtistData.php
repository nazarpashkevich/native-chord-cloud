<?php

namespace App\Domains\Spotify\Data;

use Spatie\LaravelData\Data;

class SpotifyArtistData extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly string $href,
        public readonly string $name,
    )
    {}
}
