<?php

namespace App\Domains\Media\Http\Controllers;

use App\Domains\Common\Http\Controllers\Controller;
use App\Domains\Media\Http\Requests\TrackRequest;
use App\Domains\Media\Services\TrackService;
use Illuminate\Http\RedirectResponse;

class TrackController extends Controller
{
    public function __construct(protected TrackService $service)
    {
    }

    public function upload(TrackRequest $request): RedirectResponse
    {
        $this->service->upload($request->toData());

        return redirect()->back();
    }
}
