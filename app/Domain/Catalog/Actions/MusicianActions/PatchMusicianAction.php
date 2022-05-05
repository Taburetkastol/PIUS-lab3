<?php

namespace App\Domain\Catalog\Actions\MusicianActions;
use App\Domain\Catalog\Models\Musician;
use App\Http\ApiV1\Requests\MusicianRequests\PatchMusicianRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\MusicianController;

class PatchMusicianAction
{
    public function execute(int $musicianId, array $fields)
    {
        $musician = Musician::findOrFail($musicianId);
        $musician->update($fields);
        
        return $musician;
    }
}