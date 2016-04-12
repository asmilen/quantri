<?php

Route::get('/', ['as' => 'HomeController.dashboard', 'uses' => 'HomeController@index']);

//Disable register
Route::get('login', ['as' => 'AuthController.show', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'AuthController.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'AuthController.logout', 'uses' => 'Auth\AuthController@logout']);

Route::group(['middleware' => 'auth'], function(){
	//Role management
	Route::get('role', ['as' => 'RoleController.index', 'uses' => 'RoleController@index']);
	Route::post('role/add', ['as' => 'RoleController.store', 'uses' => 'RoleController@store']);
	Route::get('synchronous', ['as' => 'RoleController.synchronous', 'uses' => 'RoleController@synchronous']);
	
	//User management
    Route::get('user', ['as' => 'UserController.index', 'uses' => 'UserController@index']);
	Route::get('user/{id}', ['as' => 'UserController.edit', 'uses' => 'UserController@edit']);
	Route::post('user/add', ['as' => 'UserController.store', 'uses' => 'UserController@store']);
	Route::patch('user/{id}', ['as' => 'UserController.update', 'uses' => 'UserController@update']);
	Route::delete('user/destroy/{id}', ['as' => 'UserController.destroy', 'uses' => 'UserController@destroy']);

	//Article management
    Route::get('article', ['as' => 'ArticleController.index', 'uses' => 'ArticleController@index']);
	Route::get('article/{id}', ['as' => 'ArticleController.edit', 'uses' => 'ArticleController@edit']);
	Route::post('article/add', ['as' => 'ArticleController.store', 'uses' => 'ArticleController@store']);
	Route::patch('article/{id}', ['as' => 'ArticleController.update', 'uses' => 'ArticleController@update']);
	Route::delete('article/destroy/{id}', ['as' => 'ArticleController.destroy', 'uses' => 'ArticleController@destroy']);

});