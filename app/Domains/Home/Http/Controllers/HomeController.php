<?php

namespace App\Domains\Home\Http\Controllers;

use App\Domains\Common\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Native\Laravel\Facades\Window;

class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Home/Index', []);
    }

    public function minimize(): void
    {
        Window::minimize();
    }

    public function unMaximize(): void
    {
        Window::resize(1800, 800);
    }

    public function maximize(): void
    {
        Window::maximize();
    }

    public function close(): void
    {
        Window::close();
    }
}
