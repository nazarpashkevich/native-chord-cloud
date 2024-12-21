<?php

namespace App\Domains\Media\Models;

use Illuminate\Database\Eloquent\Model;

class UploadedTrack extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
        ];
    }
}
