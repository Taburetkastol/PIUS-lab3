<?php

namespace App\Domain\Catalog\Actions\BandActions;
use App\Domain\Catalog\Models\Band;
use App\Http\ApiV1\Requests\BandRequests\PutBandRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\BandController;

class PutBandAction
{
    public function execute(int $bandId, PutBandRequest $request)
    {
        $band = Band::findOrFail($bandId);
        $band->update($request->all());
        
        return $band;
    }
}