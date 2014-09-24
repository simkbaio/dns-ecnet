<?php
#home
Route::get( '/', [ 'as' => 'home', 'uses' => 'frontend\PagesController@home' ] );
Route::get( 'dang-ki', [ 'as' => 'customer_register', 'uses' => 'frontend\RegisterController@create' ] );
Route::post( 'dang-ki', [ 'as' => 'register', 'uses' => 'frontend\RegisterController@store' ] );

Route::get( 'customer/login', [ 'as' => 'customer_login', 'uses' => 'frontend\SessionController@customer_create' ] );
Route::post( 'customer/login', [ 'as' => 'customer_login', 'uses' => 'frontend\SessionController@customer_store' ] );

Route::get( 'customer/logout', [
	'as'   => 'customer_logout',
	'uses' => 'frontend\SessionController@customer_destroy',
] );

//Customer Functions


Route::group( [ 'before' => 'auth_customer' ], function () {
	//Customer Page
	Route::get( 'customer', [
		'as'   => 'customer_dashbroad',
		'uses' => 'frontend\CustomerPagesController@dashbroad',
	] );

	//Add new Domain
	Route::get( 'customer/add-domain', [
		'as'   => 'customer_add_domain',
		'uses' => 'frontend\CustomerPagesController@add_domain',
	] );

	Route::post( 'customer/add-domain', [
		'as'   => 'customer_add_domain',
		'uses' => 'frontend\CustomerPagesController@store_domain',
	] );


	Route::get( 'customer/delete-domain/{domain}', [
		'as'   => 'customer_delete_domain',
		'uses' => '\frontend\CustomerPagesController@deleteDomain',
	] );

	//Show Domain
	Route::resource('customer/domains','frontend\DomainsController');

	Route::resource('customer/records','frontend\RecordsController');



} );


Route::get( 'ten-mien/dang-nhap', [ 'as' => 'domain_login', 'uses' => 'frontend\SessionController@domain_create' ] );
Route::post( 'ten-mien/dang-nhap', [ 'as' => 'domain_login', 'uses' => 'frontend\SessionController@domain_store' ] );


Route::get( 'test', function () {
	return Request::getClientIp();
} );


Route::get( 'admin', [ 'as' => 'admin', 'uses' => 'AdminPagesController@index' ] )->before( 'auth_admin' );
Route::get( 'admin/notice', [ 'as' => 'admin.notice', 'uses' => 'AdminPagesController@notice' ] );


Route::post( 'admin/users/resetpasswordrequest', [
	'as'   => 'admin.users.resetpasswordrequest',
	'uses' => 'UsersController@ResetPasswordRequest'
] );
Route::any( 'admin/user/{id}/resetpassword/{resetcode}', [ 'uses' => 'UsersController@ResetPassword' ] );


Route::get( 'admin/login', [ 'as' => 'admin.login', 'uses' => 'SessionsController@create' ] );
Route::resource( 'admin/sessions', 'SessionsController', [ 'only' => [ 'create', 'store', 'destroy' ] ] );

Route::group( array( 'prefix' => 'admin', 'before' => 'auth_admin' ), function () {
	#Authendication
	Route::get( 'logout', [ 'as' => 'admin.logout', 'uses' => 'SessionsController@destroy' ] );


	#Users
	Route::post( 'users/{id}/resetpassword/{resetCode}', [
		'as'   => 'admin.users.changepassword',
		'uses' => 'UsersController@changepassword'
	] );
	Route::resource( 'users', 'UsersController' );
	#Groups
	Route::resource( 'groups', 'GroupsController' );
	#Permissions
	Route::resource( 'permissions', 'PermissionsController' );

	Route::post( 'menuspacks/update-order/{id}', [
		'as'   => 'admin.menuspacks.update-order',
		'uses' => 'MenusPacksController@updateorder'
	] );
	Route::resource( 'menuspacks', 'MenusPacksController' );

	Route::get( 'menus/delete/{id}', [ 'uses' => 'MenusController@QuickDeleteMenu' ] );
	Route::resource( 'menuspacks.menus', 'MenusController' );


	Route::resource( 'customers', 'CustomersController' );
	Route::resource( 'products', 'ProductsController' );


} );
