<?php

namespace App\Domains\Spotify\Data;

use Spatie\LaravelData\Data;

class SpotifyListData extends Data
{
    public function __construct(
        public readonly string $href,
        public readonly int $total,
    )
    {}
}
