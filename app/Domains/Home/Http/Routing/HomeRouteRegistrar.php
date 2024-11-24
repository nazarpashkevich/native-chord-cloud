<?php

namespace App\Domains\Home\Http\Routing;

use App\Domains\Common\Http\Routing\RouteRegistrar;
use App\Domains\Home\Http\Controllers\HomeController;
use Illuminate\Contracts\Routing\Registrar;

class HomeRouteRegistrar extends RouteRegistrar
{
    protected array $middlewares = ['web'];

    public function map(Registrar $route): void
    {
        $route->group(
            ['controller' => HomeController::class, 'as' => 'home.'],
            function (Registrar $route) {
                $route->group(['middleware' => 'auth'], function (Registrar $route) {
                    $route->get('', 'index')->name('index');
                });

                $route->get('minimize', 'minimize')->name('minimize');
                $route->get('maximize', 'maximize')->name('maximize');
                $route->get('un-maximize', 'unMaximize')->name('un-maximize');
                $route->get('close', 'close')->name('close');
            });
    }
}
