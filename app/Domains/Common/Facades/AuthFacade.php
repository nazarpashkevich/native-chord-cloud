<?php

namespace App\Domains\Common\Facades;

use App\Domains\User\Enums\SocialiteProvider;
use App\Domains\User\Models\SocialAccount;

class AuthFacade
{
    public static function socialite(SocialiteProvider $provider): ?SocialAccount
    {
        return SocialAccount::query()->firstWhere('provider', $provider);
    }
}
