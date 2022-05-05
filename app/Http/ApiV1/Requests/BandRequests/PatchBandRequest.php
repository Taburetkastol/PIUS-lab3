<?php

namespace App\Http\ApiV1\Requests\BandRequests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatchBandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => ['min:0'],
        ];
    }
}