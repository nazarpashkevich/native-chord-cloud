<?php

namespace App\Domains\Media\Http\Requests;

use App\Domains\Media\Data\TrackData;
use getID3;
use Illuminate\Foundation\Http\FormRequest;

class TrackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'path'        => ['string', 'required'],
            'track'       => ['file', 'required'],
            'playlist_id' => ['int', 'nullable'],
        ];
    }

    public function toData(): TrackData
    {
        $getID3 = new getID3();
        $fileInfo = $getID3->analyze($this->file('track'));

        return TrackData::from([
            'title'      => basename($this->string('path')),
            'author'     => $fileInfo['tags']['id3v2']['artist'][0] ?? '',
            'album'      => $fileInfo['tags']['id3v2']['album'][0] ?? '',
            'playtime'   => $fileInfo['playtime_seconds'] ?? 0,
            'path'       => $this->string('path'),
            'playlistId' => $this->str('playlist_id'),
        ]);
    }
}
