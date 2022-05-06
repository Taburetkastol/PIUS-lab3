<?php

namespace App\Http\ApiV1\Requests\MusicianRequests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetMusicianRequest extends FormRequest
{
    public function rules(): array
    {
        $id = (int) $this->route('musicianId');
        return [
            'name' => ['string'],
            'main_instrument' => ['string'],
            'created_at' => ['string'],
        ];
    }
}