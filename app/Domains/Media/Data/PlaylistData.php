<?php

namespace App\Domains\Media\Data;

use App\Domains\Common\Data\BaseData;

class PlaylistData extends BaseData
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $image,
        public readonly string $id,
    ) {
    }
}
