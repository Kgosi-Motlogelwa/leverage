<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});






// Route::get('/auth', function () {
//     $credentials = generateRandomCredentials();
//     $user = new \App\Models\User();
        
//     $user->name = 'Admin';
//     $user->email = $credentials['email'];
//     $user->password = Hash::make($credentials['password']);

//     $user->save();
//     $token = $user->createToken('token')->plainTextToken;
//     // Log the token
//     Log::info('Generated token: ' . $token);
               
//     // Return the token in the response
//     return ['token' => $token]; 
// });

// Route::post('/auth', function (Request $request) {
//     // Validate the incoming request data
//     $credentials = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     // Attempt to authenticate the user
//     if (!Auth::attempt($credentials)) {
//         // If authentication fails, create a new user
//         $user = new \App\Models\User();
//         $user->name = 'Admin';
//         $user->email = $credentials['email'];
//         $user->password = Hash::make($credentials['password']);
//         $user->save();

//         // Generate a token for the user
//         $token = $user->createToken('token')->plainTextToken;

//         // Log the token
//         Log::info('Generated token: ' . $token);

//         // Return the token in the response
//         return ['token' => $token];
//     }

//     // If authentication succeeds, return an error response
//     return response()->json(['error' => 'User already authenticated'], 200);
// });