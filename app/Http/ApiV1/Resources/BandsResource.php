<?php

namespace App\Http\ApiV1\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Controllers\BandController;
/** @mixin \App\Domain\Catalog\Models\Band */

class BandsResource extends JsonResource
{
    public function toArray($request)
    {
        if (empty($this->id) 
            && empty($this->name) 
            && empty($this->genre) 
            && empty($this->created_at) 
            && empty($this->breakdown_at))
        {
            return [
                'data' => null,
                'errors' => [
                    'code' => BandController::$errorCode,
                    'message' => BandController::$errorMessage,
                    'meta' => '',
                ],
                'meta' => [],
            ];
        }
        else
        {
            return [
                'data' => [
                    'id' => $this->id,
                    'name' => $this->name,
                    'genre' => $this->genre,
                    'created_at' => $this->created_at,
                    'breakdown_at' => $this->breakdown_at
                ],
                'errors' => [],
                'meta' => [],
            ];
        }       
    }
}
