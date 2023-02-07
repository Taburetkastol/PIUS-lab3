<?php

namespace App\Domain\Catalog\Actions\MusicianActions;
use App\Domain\Catalog\Models\Musician;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\MusicianController;

class DeleteMusicianAction
{
    public function execute(int $musicianId)
    {
        $musician = Musician::findOrFail($musicianId);
        $musician->delete();
        
        return $musician;
    }
}