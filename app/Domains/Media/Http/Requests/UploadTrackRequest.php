<?php

namespace App\Domains\Media\Http\Requests;

use App\Domains\Media\Data\UploadTrackData;
use App\Domains\Media\Models\UploadedTrack;
use getID3;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class UploadTrackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'path'  => ['string', 'required', new Unique((new UploadedTrack())->getTable(), 'path')],
            'track' => ['file', 'required'],
        ];
    }

    public function toData(): UploadTrackData
    {
        $getID3 = new getID3();
        $fileInfo = $getID3->analyze($this->file('track'));

        return UploadTrackData::from([
            'title'    => basename($this->string('path')),
            'author'   => $fileInfo['tags']['id3v2']['artist'][0] ?? '',
            'album'    => $fileInfo['tags']['id3v2']['album'][0] ?? '',
            'playtime' => $fileInfo['playtime_seconds'] ?? 0,
            'path'     => $this->string('path'),
        ]);
    }
}
