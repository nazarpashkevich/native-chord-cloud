<?php

namespace App\Domains\Media\Data;

use App\Domains\Common\Data\BaseData;
use Illuminate\Support\Carbon;

class UploadedTrackData extends BaseData
{
    public function __construct(
        public readonly string $title,
        public readonly string $author,
        public readonly string $album,
        public readonly string $playtime,
        public readonly string $path,
        public readonly ?string $id = null,
    ) {
    }

    public function with(): array
    {
        return [
            'playtime_formatted' => Carbon::createFromTimestamp($this->playtime)->format('i:s'),
        ];
    }
}
