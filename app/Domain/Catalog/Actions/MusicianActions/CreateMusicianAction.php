<?php

namespace App\Domain\Catalog\Actions\MusicianActions;
use App\Domain\Catalog\Models\Musician;
use App\Http\ApiV1\Requests\MusicianRequests\CreateMusicianRequest;
use App\Http\ApiV1\Controllers\MusicianController;    

class CreateMusicianAction
{
    public function execute(array $request)
    {
        $musician = Musician::create($request);
        
        return $musician;
    }
}