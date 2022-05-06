<?php

namespace App\Http\ApiV1\Requests\BandRequests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PutBandRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'genre' => ['string'],
            'created_at' => ['string'],
            'breakdown_at' => ['string'],
        ];
    }
}