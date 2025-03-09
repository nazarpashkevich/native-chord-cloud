<?php

namespace App\Domains\User\Data;

use App\Domains\Common\Data\BaseData;
use App\Domains\User\Enums\SocialiteProvider;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;

class SocialAccountData extends BaseData
{
    public function __construct(
        #[WithCast(EnumCast::class)]
        public readonly SocialiteProvider $provider,
        public readonly string $name,
        public readonly string $external_id,
        public readonly ?string $id = null,
    ) {
    }
}
