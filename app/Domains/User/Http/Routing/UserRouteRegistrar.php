<?php

namespace App\Domains\User\Http\Routing;

use App\Domains\Common\Http\Routing\RouteRegistrar;
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
                $route->get('', 'edit')->name('edit');
                $route->patch('', 'update')->name('update');
                $route->delete('', 'destroy')->name('destroy');
            });
    }
}
