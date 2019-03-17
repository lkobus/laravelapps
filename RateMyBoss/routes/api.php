<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function(){        
    
    Route::get('profile/{id}', 'UserInfoController@find');    
    Route::post('profile', 'UserInfoController@create');
    Route::patch('profile/{id}', 'UserInfoController@update');        
    Route::middleware('auth:api')->get('user/me', 'UserInfoController@getLoggedUser');
    
    Route::post('boss', "BossController@store");
    Route::get('boss/detail/{id}', "BossController@detail");
    
    Route::post('boss/search', "BossController@autocomplete");
    Route::get('boss/search/{search}', "BossController@autocomplete");

    Route::get('menus', "MenuController@getMenus");
    Route::get("usuarios", "SkillController@usuarios");

    Route::get('skill', "SkillController@find");
    Route::get('skill/paginator', "SkillController@paginator");
    Route::get('skill/count', "SkillController@count");
    Route::post('skill', "SkillController@store");
    Route::delete('skill/{id}', "SkillController@destroy");

    

});

Route::get('validate-token', function () {
    return ['data' => 'Token is valid'];
})->middleware('auth:api');

Route::post('login', 'UserInfoController@login');
Route::post('register', 'UserInfoController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
