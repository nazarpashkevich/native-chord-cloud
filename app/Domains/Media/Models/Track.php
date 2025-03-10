<?php

namespace App\Domains\Media\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Track extends Model
{

    protected $guarded = [];

    public function playlist(): BelongsTo
    {
        return $this->belongsTo(Playlist::class);
    }
}
