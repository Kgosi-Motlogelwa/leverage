<?php

use App\Http\Controllers\API\V1\ConstituenciesController;
use App\Http\Controllers\API\V1\PollingDistrictsController;
use App\Http\Controllers\API\V1\PollingStationsController;
use App\Models\Constituencies;
use App\Models\PollingDistricts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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

function generateRandomCredentials() {
    // Generate a random email address
    $email = 'user' . rand(1, 1000) . '@example.com';

    // Generate a random password (8 characters)
    $password = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8)), 0, 8);

    return [
        'email' => $email,
        'password' => $password,
    ];
}



Route::group(['prefix' => 'v1', 'namespace' => "App\Http\Controllers\API\V1"], function () {
    
    // Normal CRUD operation
    Route::apiResource('constituencies', ConstituenciesController::class);
    // Caching 
    Route::get('pollingDistricts', function () {
        // Fetch constituencies from cache if available
        $pollingDistricts = Cache::remember('pollingDistricts', 3600, function () {
            return PollingDistricts::all();
        });
    
        return response()->json($pollingDistricts);
    });

    // Paginated Route pollingStations by specifying 'index' where pagination
    Route::get('pollingStations', [PollingStationsController::class, 'index']);


    
    Route::get('constituencies/{constituencyId}/pollingDistricts', [PollingDistrictsController::class, 'getByConstituencyId']);
    Route::get('auth', function () {
        $credentials = generateRandomCredentials();
    
        // Attempt to authenticate the user
        // if (!Auth::attempt($credentials)) {
            // If authentication fails, create a new user
            $user = new \App\Models\User();
            $user->name = 'Admin';
            $user->email = $credentials['email'];
            $user->password = Hash::make($credentials['password']);
            $user->save();
    
            // Generate a token for the user
            $token = $user->createToken('token')->plainTextToken;
    
            // Return the token in the response
            return ['token' => $token];
        // }
    });
  
    Route::middleware('auth:sanctum')->get('pollingDistricts/{pollingDistrictId}/pollingStations', [PollingStationsController::class, 'getByPollingDistrictsId']);
    
    
});




//API/V1/Constituencies
