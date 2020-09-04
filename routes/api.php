<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Auth', 'middleware' => ['json.response', 'cors']], function(){
    Route::post('/register', 'RegisterController@register');
});

/*
Route::post('/login', 'ApiLoginController@login');

Route::middleware('auth:api')->get('/logout', function(Request $request){
    $request->user()->tokens()->delete();
    return json_encode([
        "message" => "logout succesful"
    ]);
});
Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'auth:api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::group([
        'middleware' => 'auth:api',
    ], function() {
    Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify'); // Make sure to keep this as your route name

    Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
});

Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
});
Route::group([
    'middleware' => 'auth:api',
    'prefix' =>'package'
], function() {
    Route::post('create', 'PackageController@createPackages');
    Route::get('all', 'PackageController@showAllPackages');
});
