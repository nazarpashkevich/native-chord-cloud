<?php

namespace App\Domains\Media\Data;

use App\Domains\Common\Data\BaseData;
use App\Domains\Media\Enums\MediaProvider;
use App\Domains\Media\Models\Playlist;
use Illuminate\Support\Arr;

class PlaylistData extends BaseData
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly ?string $image = null,
        public readonly MediaProvider $provider = MediaProvider::Media,
        public readonly ?string $id = null,
    ) {
    }

    public function toModel(null|int|Playlist $playlist = null): Playlist
    {
        if ($this->provider !== MediaProvider::Media) {
            throw new \Exception('Only internal playlist can be saved!');
        }

        if (is_int($playlist)) {
            $playlist = Playlist::query()->find($playlist);
        }

        $playlist ??= new Playlist();

        $playlist->fill(Arr::only($this->toArray(), ['title', 'description', 'image']));

        return $playlist;
    }
}
