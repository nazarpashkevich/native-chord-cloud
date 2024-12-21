<?php

namespace App\Domains\Media\Http\Requests;

use App\Domains\Media\Data\UploadTrackData;
use Illuminate\Foundation\Http\FormRequest;

class UploadTrackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'track' => ['string', 'required'],
        ];
    }

    public function toData(): UploadTrackData
    {
        return UploadTrackData::from([
            'track' => $this->string('track'),
        ]);
    }
}
