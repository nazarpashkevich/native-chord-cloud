<?php

namespace App\Domains\Media\Http\Routing;

use App\Domains\Common\Http\Routing\RouteRegistrar;
use App\Domains\Media\Http\Controllers\PlaylistController;
use App\Domains\Media\Http\Controllers\TrackController;
use Illuminate\Contracts\Routing\Registrar;

class MediaRouteRegistrar extends RouteRegistrar
{
    protected array $middlewares = ['web', 'auth'];

    public function map(Registrar $route): void
    {
        $route->group(['as' => 'media.', 'prefix' => 'media'], function (Registrar $route) {
            $route->group(
                ['as' => 'playlist.', 'prefix' => 'playlists', 'controller' => PlaylistController::class],
                function (Registrar $route) {
                    $route->get('{playlist}', 'show')->name('show');
                    $route->post('', 'store')->name('store');
                });
            $route->group(
                ['as' => 'track.', 'prefix' => 'track', 'controller' => TrackController::class],
                function (Registrar $route) {
                    $route->post('upload', 'upload')->name('upload');
                });
        });
    }
}
