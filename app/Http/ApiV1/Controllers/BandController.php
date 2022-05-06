<?php

namespace App\Http\ApiV1\Controllers;

use Illuminate\Http\Request;
use App\Http\ApiV1\Controllers\Controller;  
use App\Domain\Catalog\Actions\BandActions\GetBandAction;
use App\Domain\Catalog\Actions\BandActions\CreateBandAction;
use App\Domain\Catalog\Actions\BandActions\DeleteBandAction;
use App\Domain\Catalog\Actions\BandActions\PatchBandAction;
use App\Domain\Catalog\Actions\BandActions\PutBandAction;
use App\Http\ApiV1\Requests\BandRequests\CreateBandRequest;
use App\Http\ApiV1\Requests\BandRequests\PutBandRequest;
use App\Http\ApiV1\Requests\BandRequests\PatchBandRequest;
use App\Http\ApiV1\Resources\BandsResource;

class BandController extends Controller
{
    public static string $errorCode = '200';
    public static string $errorMessage = 'OK';

    public function getBand(int $bandId, GetBandAction $action)
    {   
        $band = new BandsResource($action->execute($bandId));
        return response()->json($band, BandController::$errorCode);
    }

    public function createBand(CreateBandRequest $request,
                            CreateBandAction $action
    ) {
        $band = new BandsResource($action->execute($request->all()));
        return response()->json($band, BandController::$errorCode);
    }

    public function changeBand(int $bandId,
                        PutBandRequest $request,
                        PutBandAction $action
    ) {
        $band = new BandsResource($action->execute($bandId, $request));
        return response()->json($band, BandController::$errorCode);        
    }

    public function changeBandsParameters(int $bandId,
                        PatchBandRequest $request,
                        PatchBandAction $action
    ) {
        $band = new BandsResource($action->execute($bandId, $request->all()));
        return response()->json($band, BandController::$errorCode);
    }

    public function deleteBand(int $bandId, DeleteBandAction $action)
    {
        $band = new BandsResource($action->execute($bandId));
        return response()->json($band, BandController::$errorCode);
    }   
}
