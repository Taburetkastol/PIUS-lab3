<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\ApiV1\Resources\BandsResource;
use App\Http\ApiV1\Resources\MusiciansResource;
use App\Http\ApiV1\Resources\MembershipResource;
use App\Http\ApiV1\Resources\NotFoundResource;
use App\Http\ApiV1\Controllers\BandController;
use App\Http\ApiV1\Controllers\MusicianController;
use App\Http\ApiV1\Controllers\MembershipController;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param Request $request
     * @param Throwable $e
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof NotFoundHttpException)
        {
            return response()->json(new NotFoundResource($request), 404);
        }
        if ($request->is('api/v1/bands/*')) 
        {
            if ($e instanceof ModelNotFoundException)
            {
                BandController::$errorCode = 404;
                BandController::$errorMessage = "NOT FOUND";

                return response()->json(new BandsResource($request), 404);
            }
            else
            {
                BandController::$errorCode = 500;
                BandController::$errorMessage = "INTERNAL SERVER EXCEPTION";

                return response()->json(new BandsResource($request), 500);
            }
        }
        else if ($request->is('api/v1/musicians/*')) 
        {
            if ($e instanceof ModelNotFoundException)
            {
                MusicianController::$errorCode = 404;
                MusicianController::$errorMessage = "NOT FOUND";

                return response()->json(new MusiciansResource($request), 404);
            }
            else
            {
                MusicianController::$errorCode = 500;
                MusicianController::$errorMessage = "INTERNAL SERVER EXCEPTION";

                return response()->json(new MusiciansResource($request), 500);
            }
        }
        else if ($request->is('api/v1/membership/*')) 
        {
            if ($e instanceof ModelNotFoundException)
            {
                MembershipController::$errorCode = 404;
                MembershipController::$errorMessage = "NOT FOUND";

                return response()->json(new MembershipResource($request), 404);
            }
            else
            {
                MembershipController::$errorCode = 500;
                MembershipController::$errorMessage = "INTERNAL SERVER EXCEPTION";

                return response()->json(new MembershipResource($request), 500);
            }
        }

        return parent::render($request, $e);
    }
}
