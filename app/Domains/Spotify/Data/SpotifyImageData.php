<?php

namespace App\Domains\Spotify\Data;

use Spatie\LaravelData\Data;

class SpotifyImageData extends Data
{
    public function __construct(
        public readonly string $url,
        public readonly ?int $height,
        public readonly ?int $width,
    )
    {}
}
