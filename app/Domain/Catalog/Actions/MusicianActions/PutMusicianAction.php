<?php

namespace App\Domain\Catalog\Actions\MusicianActions;
use App\Domain\Catalog\Models\Musician;
use App\Http\ApiV1\Requests\MusicianRequests\PutMusicianRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\MusicianController;

class PutMusicianAction
{
    public function execute(int $musicianId, PutMusicianRequest $request)
    {
        $musician = Musician::findOrFail($musicianId);
        $musician->update($request->all());
        
        return $musician;
    }
}