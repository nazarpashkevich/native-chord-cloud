<?php

namespace App\Domains\Media\Data;

use App\Domains\Common\Data\BaseData;
use App\Domains\Media\Enums\MediaProvider;

class PlaylistData extends BaseData
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $image,
        public readonly MediaProvider $provider,
        public readonly string $id,
    ) {
    }
}
