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
    Route::post('login', 'AuthController@login'); //Use built-in login from slides
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout'); //Use built-in logout from slides
        Route::get('user', 'AuthController@user');
    });
});

//extinguisher/id/fileupload
Route::post('extinguisher/{id}/file-upload', 'ExtinguisherController@fileUploadPost')->name('file.upload.post');

