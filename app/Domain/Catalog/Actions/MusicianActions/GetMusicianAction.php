<?php

namespace App\Domain\Catalog\Actions\MusicianActions;
use App\Domain\Catalog\Models\Musician;
use App\Http\ApiV1\Requests\MusicianRequests\GetMusicianRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\MusicianController;

class GetMusicianAction
{
    public function execute(int $musicianId)
    {
        $musician = Musician::findOrFail($musicianId);

        return $musician;       
    }
}