<?php

namespace App\Domains\User\Models;

use App\Domains\User\Enums\SocialiteProvider;
use Illuminate\Database\Eloquent\Model;

/**
 * @property SocialiteProvider $provider
 * @property string $access_token
 * @property string $refresh_token
 * @property int $expires_in
 * @property string $external_id
 * @property string $name
 */
class SocialAccount extends Model
{
    protected $guarded = [];
    protected $casts = [
        'provider' => SocialiteProvider::class
    ];

}
