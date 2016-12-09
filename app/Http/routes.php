<?php


Route::get('/',[
	'as'	=>'home',
	'uses'	=>'HomeController@home'
]);

/**
 * authentication section route
 * ============================================================================================
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

Route::get('logout',[

	'as'	=>'logout',
	'uses'	=>'UserController@signOut'

])->middleware('auth');

Route::get('user/edit/{id}',[

	'as'	=>'user-edit',
	'uses'	=>'UserController@userEdit'

])->middleware('auth');

Route::post('user/edit/update',[

	'as'	=>'user-update',
	'uses'	=>'UserController@userUpdate'

])->middleware('auth');

/*
*reseting password 
********************************************************************************************************
*/

Route::get('password/email', '\App\Http\Controllers\Auth\PasswordController@getEmail');

Route::post('password/email', '\App\Http\Controllers\Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', '\App\Http\Controllers\Auth\PasswordController@getReset');

Route::post('password/reset', '\App\Http\Controllers\Auth\PasswordController@postReset');

//user confirmation route
//******************************************************************************************************

Route::get('user/activate/{confirmation_code}',
	'UserController@confirmUser');

//user dashboard route
//******************************************************************************************************

Route::get('user/dashboard',[
	'as'	=>'dashboard',
	'uses'	=>'UserController@userDashboard'
])->middleware('auth');


Route::get('admin',[
	'as'	=>'admin',
	'uses'	=>'UserController@admin'
])->middleware('auth');

/**
 * article route
 ******************************************************************************************************
 */
 
 Route::get('post/article',[

 	'as'	=>'article',
 	'uses'	=>'ArticleController@getArticle'

 ])->middleware('auth');

  Route::post('post/article',[
 	
 	'as'	=>'post_article',
 	'uses'	=>'ArticleController@postArticle'

 ])->middleware('auth');

  Route::get('article/{slug}',[
  	'as'=>'show',
  	'uses'	=>'ArticleController@show'
  ]);

    Route::get('article/edit/{slug}',[
  	'as'=>'edit',
  	'uses'	=>'ArticleController@edit'
  ]);

Route::get('article/delete/{slug}',[
  	'as'=>'delete',
  	'uses'	=>'ArticleController@delete'
  ]);

//*******************************************************************************************
//voting system

Route::post('article/upvote/{slug}',[
	'as' =>'up',
	'uses' =>'Vote@upvote'
])->middleware('auth');

Route::post('downvote/{slug}',[
	'as' =>'down',
	'uses' =>'Vote@downvote'
])->middleware('auth');