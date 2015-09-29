<?php
Route::get('/', array(
	'as' 	=> 'home',
	'uses'	=> 'HomeController@home'
	));

Route::get('/groups', array(
	'as'	=> 'groups',
	'uses'	=> 'HomeController@groups'
	));
Route::post('/list-more-groups/{id}','HomeController@listMoreGroups');
Route::get('/friends', array(
	'as'	=> 'friends',
	'uses'	=> 'HomeController@friends'
	));
Route::get('/list-groups', array(
	'as'	=> 'list-groups',
	'uses'	=> 'HomeController@listGroups'
	));

Route::get('/members', array(
	'as'	=> 'members',
	'uses'	=> 'HomeController@members'
	));

Route::get('/profile-user-{username}',	'ProfileController@user');
Route::get('/group',					'RegisterController@group');
Route::get('/group-{groupname}',		'ProfileController@group');
Route::get('/inbox', array(
	'as'	=> 'inbox',
	'uses'	=> 'HomeController@inbox'
	));
Route::get('/individual-group',			'HomeController@indGroup');
Route::get('/timeline',					'HomeController@timeline');

Route::post('/join-group', array(
	'as'	=> 'joingroup',
	'uses'	=> 'ProfileController@joinGroup'
	));
Route::post('/delete-group', array(
	'as'	=> 'deletegroup',
	'uses'	=> 'ProfileController@deleteGroup'
	));

Route::post('/deletefriend',			'ProfileController@deleteFriend');

Route::post('/update-skill',			'ProfileController@updateSkill');
Route::post('/update-bio',				'ProfileController@updateBio');
Route::post('/update-timeln', 			'ProfileController@updateTimeline');
Route::post('/chng-profile-image',		'ProfileController@chngProfImg');
Route::post('/request-friendship',		'ProfileController@requestFriendship');
Route::post('/accept-friendship',		'ProfileController@acceptFriendship');
Route::post('/deny-friendship', 		'ProfileController@denyFriendship');

Route::get('/chng-cover', 				'ProfileController@coverImg');
Route::get('/up-img', 					'ProfileController@upImg');
Route::get('/all-imgs',					'ProfileController@allImgs');
Route::get('/file-upload', 				'FilesController@fileUpload');
Route::any('/submit-file-upld',			'FilesController@submitFileUpload');



/*
 Authenticated group
*/
 Route::group(array('before' => 'auth'), function(){
 	/*
			CSRF protection group
	*/
	Route::group(array('before' => 'csrf'), function(){
		/*
			Change Password (POST)
 		*/
	Route::post('/account/change-password', array(
		'as'	=> 'account-change-password-post',
		'uses'	=> 'AccountController@postChangePassword'
		));

	});

 	/*
		Change Password (GET)
 	*/
	Route::get('/password', array(
		'as'	=> 'account-change-password',
		'uses'	=> 'AccountController@getChangePassword'
		));

 	/*
		Sign out (GET)
 	*/

	Route::get('/account/sign-out/', array(
		'as'	=> 'account-sign-out',
		'uses'	=> 'AccountController@getSignOut'
		));

 });

/*
	unautheticated group
*/
Route::group(array('before' => 'guest'), function(){
	/*
		CSRF protection group
	*/
		Route::group(array('before' => 'csrf'), function(){

		});
	/*
		create account (GET)
	*/
	Route::get('/account/create', array(
			'as' 	=> 'account-create',
			'uses'	=> 'AccountController@getCreate'
		));
	

	Route::post('/account/create', array(
			'as'	=> 'account-create-post',
			'uses'	=> 'AccountController@postCreate'
			));
	Route::get('/account/activate/{code}', array(
			'as'	=> 'account-activate',
			'uses'	=> 'AccountController@getActivate'
			));
	Route::post('/account/signin', array(
			'as'	=> 'account-sign-in-post',
			'uses'	=> 'AccountController@postSignIn'
			));

	
});
Route::get('/account/signin', array(
	'as'	=> 'account-sign-in',
	'uses'	=> 'AccountController@getSignIn'
	));




