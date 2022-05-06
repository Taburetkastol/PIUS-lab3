<?php

namespace App\Domain\Catalog\Actions\BandActions;
use App\Domain\Catalog\Models\Band;
use App\Http\ApiV1\Requests\BandRequests\PatchBandRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\BandController;

class PatchBandAction
{
    public function execute(int $bandId, array $fields)
    {
        $band = Band::findOrFail($bandId);
        $band->update($fields);

        return $band;
    }
}