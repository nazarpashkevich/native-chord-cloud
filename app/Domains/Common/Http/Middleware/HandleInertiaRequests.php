<?php

namespace App\Domains\Common\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Native\Laravel\Facades\Window;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $maximized = false;

        try {
            $window = Window::current();
            $maximized = $window->x === 0 && $window->y === 0;
        } catch (\ErrorException) {
        }

        return [
            ...parent::share($request),
            'auth'   => [
                'user' => $request->user(),
            ],
            'window' => [
                'maximized' => $maximized,
            ],
        ];
    }
}
