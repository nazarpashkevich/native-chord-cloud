<?php

namespace App\Domains\Media\Http\Requests;

use App\Domains\Media\Data\PlaylistData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class PlaylistRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'  => ['string', 'required'],
            'description'  => ['string', 'required'],
            'image'  => ['file', 'nullable'],
        ];
    }

    public function toData(): PlaylistData
    {
        $validated = $this->validated();
        $validated['image'] = '';

        if ($this->hasFile('image')) {
            $validated['image'] = Storage::url(
                $this->file('image')->store('uploads', 'public')
            );
        }

        return PlaylistData::from($validated);
    }
}
