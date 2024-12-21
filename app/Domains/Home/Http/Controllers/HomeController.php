<?php

namespace App\Domains\Home\Http\Controllers;

use App\Domains\Common\Http\Controllers\Controller;
use App\Domains\Media\Data\UploadedTrackData;
use App\Domains\Media\Services\TrackService;
use Inertia\Inertia;
use Inertia\Response;
use Native\Laravel\Facades\Window;

class HomeController extends Controller
{
    public function __construct(protected TrackService $service)
    {
    }

    public function index(): Response
    {
        return Inertia::render('Home/Index', [
            'all_tracks' => UploadedTrackData::toWrap($this->service->uploadedTracks()),
        ]);
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
