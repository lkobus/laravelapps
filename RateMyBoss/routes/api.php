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


Route::group(['middleware' => 'api'], function(){    

    //get single contact
    
    Route::get('profile/{id}', 'UserInfoController@find');    
    Route::post('profile', 'UserInfoController@create');
    Route::patch('profile/{id}', 'UserInfoController@update');    
    
    Route::middleware('auth:api')->get('user/me', 'UserInfoController@getLoggedUser');
        
});

Route::post('login', 'UserInfoController@login');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
