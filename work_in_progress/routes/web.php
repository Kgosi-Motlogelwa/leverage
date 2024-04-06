<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

Route::get('/auth', function () {
    $credentials = [
        'email' => 'kgosi.om@gmail.com',
        'password' => 'Password12345',
    ];

    if (!Auth::attempt($credentials)){
        $user = new \App\Models\User();
        
        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            if($user){
                $token = $user->createToken('token');
            }
            

            return ['token' => $token->plainTextToken];
        }
    }
});

