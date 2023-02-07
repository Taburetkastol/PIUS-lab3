<?php

namespace App\Http\ApiV1\Requests\BandRequests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetBandRequest extends FormRequest
{
    public function rules(): array
    {
        $id = (int) $this->route('bandId');
        return [
            'name' => ['string'],
            'genre' => ['string'],
            'created_at' => ['string'],
            'breakdown_at' => ['string'],
        ];
    }
}