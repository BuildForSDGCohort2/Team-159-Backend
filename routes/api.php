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

Route::group(['namespace' => 'Authentication', 'middleware' => ['json.response', 'cors']], function(){
    /*Route::post('/register', 'RegisterController@register');*/
    
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['namespace' => 'Authentication', 'middleware' => ['json.response', 'cors']], function(){
    Route::post('/login', 'ApiLoginController@login');
});

Route::middleware('auth:api')->get('/logout', function(Request $request){
    $request->user()->tokens()->delete();
    return json_encode([
        "message" => "logout succesful"
    ]);
});

Route::group([ 'namespace' => 'Auth',   'middleware' => ['json.response', 'cors'] ,'preix' => 'password'], 
function () {    
    /*Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');*/
 });

 Route::group([ 'namespace' => 'Auth',   'middleware' => ['json.response', 'cors'], 'prefix' => 'email'],
  function () {    
     Route::get('verify/{id}', 'VerificationController@verify')->name('verification.verify'); // Make sure to keep this as your route name
     Route::get('resend', 'VerificationController@resend')->name('verification.resend');
});


Route::group(['middleware' => ['json.response', 'cors', 'auth:api'],'prefix' => 'package'], 
function () {    
    Route::post('create', 'PackageController@store');
    Route::get('all', 'PackageController@showAllPackages');
    Route::post('{package}', 'PackageController@update');
    Route::get('edit/{package}', 'PackageController@edit');
    Route::get('createPackage', 'PackageController@createPackages');
});