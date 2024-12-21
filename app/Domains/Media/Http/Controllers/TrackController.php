<?php

namespace App\Domains\Media\Http\Controllers;

use App\Domains\Common\Http\Controllers\Controller;
use App\Domains\Media\Http\Requests\UploadTrackRequest;
use App\Domains\Media\Services\TrackService;
use Illuminate\Http\RedirectResponse;

class TrackController extends Controller
{
    public function __construct(protected TrackService $service)
    {
    }

    public function upload(UploadTrackRequest $request): RedirectResponse
    {
        $this->service->upload($request->toData());

        return redirect()->back();
    }
}
