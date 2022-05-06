<?php

namespace App\Http\ApiV1\Requests\MusicianRequests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMusicianRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'min:0',
        ];
    }
}