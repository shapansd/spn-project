<?php

Route::get('/',[
	'as'	=>'home',
	'uses'	=>'HomeController@home'
]);

/**
 * authentication section route
 * ===============================================
 */
Route::get('register',[
	'as'	=>'register',
	'uses'	=>'UserController@getSignUp'
]);

Route::post('/register',[
	'as'	=>'signUp',
	'uses'	=>'UserController@postSignUp'
]);


Route::get('login',[
	'as'	=>'login',
	'uses'	=>'UserController@getSignIn'
]);

Route::post('/login',[
	'as'	=>'login',
	'uses'	=>'UserController@postSignIN'
]);



