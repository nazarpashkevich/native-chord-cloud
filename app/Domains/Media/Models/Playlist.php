<?php

namespace App\Domains\Media\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $title
 * @property string $description
 * @property string $image
 * @property int $id
 *
 * @property \Illuminate\Support\Collection<\App\Domains\Media\Models\Track> $tracks
 */
class Playlist extends Model
{
    protected $guarded = [];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
}
