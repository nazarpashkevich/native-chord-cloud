<?php

namespace App\Domains\Spotify\Http\Routing;

use App\Domains\Common\Http\Routing\RouteRegistrar;
use App\Domains\Spotify\Http\Controllers\SpotifyPlaylistController;
use Illuminate\Contracts\Routing\Registrar;

class SpotifyRouteRegistrar extends RouteRegistrar
{
    protected array $middlewares = ['web', 'auth'];

    public function map(Registrar $route): void
    {
        $route->group(['as' => 'spotify.', 'prefix' => 'spotify'], function (Registrar $route) {
            $route->group(
                ['as' => 'playlist.', 'prefix' => 'playlists', 'controller' => SpotifyPlaylistController::class],
                function (Registrar $route) {
                    $route->get('{id}', 'show')->name('show');
                });
        });
    }
}
