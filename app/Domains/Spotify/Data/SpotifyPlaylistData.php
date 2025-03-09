<?php

namespace App\Domains\Spotify\Data;

use App\Domains\Media\Data\PlaylistData;
use App\Domains\Media\Enums\MediaProvider;
use Spatie\LaravelData\Data;

class SpotifyPlaylistData extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly string $description,
        public readonly array $images,
        public readonly string $name,
        public readonly SpotifyListData $tracks,
    )
    {}

    public function toMediaPlaylist(): PlaylistData
    {
        return new PlaylistData(
            $this->name,
            $this->description,
            $this->images[0]['url'] ?? '',
            MediaProvider::Spotify,
            $this->id
        );
    }
}
