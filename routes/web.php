<?php

/*Admin panel*/
Route::get('/panel','Auth\AdminLoginController@showLoginForm');
Route::post('/adminLogIn','Auth\AdminLoginController@login');
Route::get('/adminPanel','AdminController@adminPanel');
Route::get('/adminPanel/showUsers','AdminController@showUsers');
Route::get('/adminPanel/posts','AdminController@posts');

/*Register SignIn and SignOut*/
Route::post('/register','UserController@register');
Route::post('/signIn','UserController@signIn');
Route::get('/signOut','UserController@signOut');

/*ProfileHome view*/
Route::get('/','ProfileController@home')->name('home');
Route::get('/{id}',[
    'uses'=>'ProfileController@homeProfile',
    'as'=>'homeProfile.index'
]);
Route::get('/{id}/editProfile',[
    'uses'=>'ProfileController@editProfile',
    'as'=>'profile.index'
]);
Route::post('/profilePic','ProfileController@profilePic');
Route::get('/{id}/editProfile/editInfo','ProfileController@editInfo');
Route::post('/updateInfo','ProfileController@updateInfo');
Route::get('/{id}/editProfile/editUser','ProfileController@editUser');
Route::post('/updateUser','ProfileController@updateUser');
Route::get('/{id}/notification','ProfileController@viewNotification');

/*Search Friend*/
Route::post('/search','SearchController@searchFriend');

/*Friends*/
Route::get('/{id}/friends',[
    'uses'=>'FriendController@getIndex',
    'as'=>'friend.index'
]);
Route::get('/friends/add/{id}',[
    'uses'=>'FriendController@getAdd',
    'as'=>'friend.add'
]);
Route::get('/friends/accept/{id}',[
    'uses'=>'FriendController@getAccept',
    'as'=>'friend.accept'
]);
Route::get('/friends/reject/{id}',[
    'uses'=>'FriendController@getReject',
    'as'=>'friend.reject'
]);

Route::get('/friends/remove/{id}',[
    'uses'=>'FriendController@getRemove',
    'as'=>'friend.remove'
]);

/*Post something*/
Route::post('/status','PostController@postStatus');

/*Comment something*/
Route::post('/status/{post}/comment','CommentController@createComment');
Route::get('status/{id}/comments','CommentController@showComment');