<?php

use Illuminate\Http\Request;
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

use App\Client;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//calls function BuildingController show
//Route::get('/building/{building}' , 'BuildingController@show');

Route::apiResource('/building' , 'BuildingController');

Route::apiResource('/client' , 'ClientController');

Route::apiResource('/extinguisher' , 'ExtinguisherController');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

//Route::get("hello", function() {
//    return "hello world";

//});
