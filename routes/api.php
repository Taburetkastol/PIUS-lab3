<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\ApiV1\Controllers\BandController;
use App\Http\ApiV1\Controllers\MusicianController;
use App\Http\ApiV1\Controllers\MembershipController;
use App\Domain\Catalog\Models\Band;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/bands/{bandId}', [BandController::class, 'getBand']);
Route::post('v1/bands', [BandController::class, 'createBand']);
Route::delete('v1/bands/{bandId}', [BandController::class, 'deleteBand']);
Route::put('v1/bands/{bandId}', [BandController::class, 'changeBand']);
Route::patch('v1/bands/{bandId}', [BandController::class, 'changeBandsParameters']);

Route::get('v1/musicians/{musicianId}', [MusicianController::class, 'getMusician']);
Route::post('v1/musicians', [MusicianController::class, 'createMusician']);
Route::delete('v1/musicians/{musicianId}', [MusicianController::class, 'deleteMusician']);
Route::put('v1/musicians/{musicianId}', [MusicianController::class, 'changeMusician']);
Route::patch('v1/musicians/{musicianId}', [MusicianController::class, 'changeMusiciansParameters']);

Route::get('v1/membership/{membershipId}', [MembershipController::class, 'getMembership']);
Route::post('v1/membership', [MembershipController::class, 'createMembership']);
Route::delete('v1/membership/{membershipId}', [MembershipController::class, 'deleteMembership']);
Route::put('v1/membership/{membershipId}', [MembershipController::class, 'changeMembership']);
Route::patch('v1/membership/{membershipId}', [MembershipController::class, 'changeMembershipsParameters']);