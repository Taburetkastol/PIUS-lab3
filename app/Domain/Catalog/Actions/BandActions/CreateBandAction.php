<?php

namespace App\Domain\Catalog\Actions\BandActions;
use App\Domain\Catalog\Models\Band;
use App\Http\ApiV1\Requests\BandRequests\CreateBandRequest;
use App\Http\ApiV1\Controllers\BandController;    

class CreateBandAction
{
    public function execute(array $request)
    {
        $band = Band::create($request);

        return $band;
    }
}