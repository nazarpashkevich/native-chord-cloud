<?php

namespace App\Domains\Spotify\Data;

use Spatie\LaravelData\Data;

class SpotifyProfileData extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly string $country,
        public readonly string $product,
        public readonly string $type,
        public readonly string $uri,
        public readonly string $display_name = '',
    )
    {}
}
