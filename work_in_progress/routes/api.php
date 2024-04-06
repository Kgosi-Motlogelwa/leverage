<?php

use App\Http\Controllers\API\V1\ConstituenciesController;
use App\Http\Controllers\API\V1\PollingDistrictsController;
use App\Http\Controllers\API\V1\PollingStationsController;
use App\Models\Constituencies;
use App\Models\PollingDistricts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1', 'namespace'=>"App\Http\Controllers\API\V1"], function() {
    Route::apiResource('constituencies', ConstituenciesController::class);
    Route::apiResource('pollingDistricts', PollingDistrictsController::class);
    Route::apiResource('pollingStations', PollingStationsController::class);

    Route::get('constituencies/{constituencyId}/pollingDistricts', [PollingDistrictsController::class, 'getByConstituencyId']);
});

Route::group(['prefix' => 'v1', 'namespace'=>"App\Http\Controllers\API\V1", 'middleware' => 'auth:sanctum'], function() {
    // Custom routes
    Route::get('pollingDistricts/{pollingDistrictsId}/pollingStations', [PollingStationsController::class, 'getByPollingDistrictsId']);
});


//API/V1/Constituencies
