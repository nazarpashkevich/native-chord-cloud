<?php

namespace App\Domains\User\Http\Controllers\Connect;

use App\Domains\Common\Http\Controllers\Controller;
use App\Domains\User\Services\Socialite\AccountsSpotifyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Native\Laravel\Facades\Shell;

class SpotifyController extends Controller
{
    public function __construct(protected AccountsSpotifyService $service)
    {
    }

    public function index(): JsonResponse
    {
        $href = $this->service->authorizeLink(Auth::user());

        Shell::openExternal($href);

        return JsonResponse::fromJsonString(json_encode([
            'href' => $href,
        ]));
    }


    public function callback(Request $request): RedirectResponse
    {
        $this->service->accessToken($request->string('code'));

        return Redirect::to(route('home.index'));
    }
}
