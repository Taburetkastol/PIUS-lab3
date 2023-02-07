<?php

namespace App\Http\ApiV1\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Controllers\MusicianController;
/** @mixin \App\Domain\Catalog\Models\Musician */

class MusiciansResource extends JsonResource
{
    public function toArray($request)
    {
        if (empty($this->id)
            && empty($this->name)
            && empty($this->main_instrument) 
            && empty($this->created_at))
        {
            return [
                'data' => null,
                'errors' => [
                    'code' => MusicianController::$errorCode,
                    'message' => MusicianController::$errorMessage,
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
                    'main_instrument' => $this->main_instrument,
                    'created_at' => $this->created_at,
                ],
                'errors' => [],
                'meta' => [],
            ];
        }       
    }
}
