<?php

namespace App\Http\ApiV1\Controllers;

use Illuminate\Http\Request;
use App\Http\ApiV1\Controllers\Controller;  
use App\Domain\Catalog\Actions\MusicianActions\GetMusicianAction;
use App\Domain\Catalog\Actions\MusicianActions\CreateMusicianAction;
use App\Domain\Catalog\Actions\MusicianActions\DeleteMusicianAction;
use App\Domain\Catalog\Actions\MusicianActions\PatchMusicianAction;
use App\Domain\Catalog\Actions\MusicianActions\PutMusicianAction;
use App\Http\ApiV1\Requests\MusicianRequests\CreateMusicianRequest;
use App\Http\ApiV1\Requests\MusicianRequests\PutMusicianRequest;
use App\Http\ApiV1\Requests\MusicianRequests\PatchMusicianRequest;
use App\Http\ApiV1\Resources\MusiciansResource;

class MusicianController extends Controller
{
    public static string $errorCode = '200';
    public static string $errorMessage = 'OK';

    public function getMusician(int $musicianId, GetMusicianAction $action)
    {   
        $musician = new MusiciansResource($action->execute($musicianId));
        return response()->json($musician, MusicianController::$errorCode);
    }

    public function createMusician(CreateMusicianRequest $request,
                            CreateMusicianAction $action
    ) {
        $musician = new MusiciansResource($action->execute($request->all()));
        return response()->json($musician, MusicianController::$errorCode);
    }

    public function changeMusician(int $musicianId,
                        PutMusicianRequest $request,
                        PutMusicianAction $action
    ) {
        $musician = new MusiciansResource($action->execute($musicianId, $request));
        return response()->json($musician, MusicianController::$errorCode);        
    }

    public function changeMusiciansParameters(int $musicianId,
                        PatchMusicianRequest $request,
                        PatchMusicianAction $action
    ) {
        $musician = new MusiciansResource($action->execute($musicianId, $request->all()));
        return response()->json($musician, MusicianController::$errorCode);
    }

    public function deleteMusician(int $musicianId, DeleteMusicianAction $action)
    {
        $musician = new MusiciansResource($action->execute($musicianId));
        return response()->json($musician, MusicianController::$errorCode);
    }   
}
