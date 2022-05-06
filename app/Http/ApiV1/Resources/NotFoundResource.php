<?php

namespace App\Http\ApiV1\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotFoundResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => null,
            'errors' => [
                'code' => 404,
                'message' => "NotFoundHttpException",
                'meta' => '',
            ],
            'meta' => [],
        ];  
    }
}
