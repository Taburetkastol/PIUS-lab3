<?php

namespace App\Http\ApiV1\Requests\MembershipRequests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatchMembershipRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => ['min:0'],
        ];
    }
}