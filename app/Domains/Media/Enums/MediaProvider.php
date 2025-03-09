<?php

namespace App\Domains\Media\Enums;

enum MediaProvider: string
{
    case Internal = 'internal';
    case Spotify = 'spotify';
}
