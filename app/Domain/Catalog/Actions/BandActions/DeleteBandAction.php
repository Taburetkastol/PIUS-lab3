<?php

namespace App\Domain\Catalog\Actions\BandActions;
use App\Domain\Catalog\Models\Band;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\BandController;

class DeleteBandAction
{
    public function execute(int $bandId)
    {
        $band = Band::findOrFail($bandId);
        $band->delete();
        
        return $band;
    }
}