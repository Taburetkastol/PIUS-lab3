<?php

namespace App\Http\ApiV1\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Controllers\MembershipController;
/** @mixin \App\Domain\Catalog\Models\Membership */

class MembershipResource extends JsonResource
{
    public function toArray($request)
    {
        if (empty($this->id) 
            && empty($this->musician_id) 
            && empty($this->band_id))
        {
            return [
                'data' => null,
                'errors' => [
                    'code' => MembershipController::$errorCode,
                    'message' => MembershipController::$errorMessage,
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
                    'musician_id' => $this->musician_id,
                    'band_id' => $this->band_id,
                ],
                'errors' => [],
                'meta' => [],
            ];
        }       
    }
}
