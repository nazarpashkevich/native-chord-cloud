<?php

namespace App\Domains\User\Http\Routing;

use App\Domains\Common\Http\Routing\RouteRegistrar;
use App\Domains\User\Http\Controllers\Connect\SpotifyController;
use App\Domains\User\Http\Controllers\ProfileController;
use Illuminate\Contracts\Routing\Registrar;

class UserRouteRegistrar extends RouteRegistrar
{
    protected array $middlewares = ['auth', 'web'];

    public function map(Registrar $route): void
    {
        $route->group(
            ['controller' => ProfileController::class, 'prefix' => 'profile', 'as' => 'profile.'],
            function (Registrar $route) {
                $route->get('', 'index')->name('index');
                $route->get('settings', 'edit')->name('edit');
                $route->patch('', 'update')->name('update');
                $route->delete('', 'destroy')->name('destroy');

                $route->group(['prefix' => 'connect', 'as' => 'connect.'], function (Registrar $route) {
                    $route->group(
                        ['prefix' => 'spotify', 'as' => 'spotify.', 'controller' => SpotifyController::class],
                        function (Registrar $route) {
                            $route->get('', 'index')->name('index');
                            $route->get('callback', 'callback')->name('callback');
                        }
                    );
                });
            });
    }
}
