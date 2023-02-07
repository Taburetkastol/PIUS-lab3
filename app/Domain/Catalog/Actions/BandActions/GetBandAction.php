<?php

namespace App\Domain\Catalog\Actions\BandActions;
use App\Domain\Catalog\Models\Band;

class GetBandAction
{
    public function execute(int $bandId)
    {
        $band = Band::findOrFail($bandId);
        
        return $band;       
    }
}