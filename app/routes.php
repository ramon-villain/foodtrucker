<?php

/*
 * Front-end URLS
 */

Route::get('/', [

	'as'    => 'home',
	'uses'  => 'HomeController@index']);

Route::get('/cadastrar', [
	'as'    => 'register_path',
	'uses'  => 'RegistrationController@index']);

Route::post('/cadastrar', [
	'as'    => 'register_path',
	'uses'  => 'RegistrationController@store']);

Route::get('/login', [
	'as'    => 'login_path',
	'uses'  => 'LoginController@index']);

Route::post('/login', [
	'as'    => 'login_path',
	'uses'  => 'LoginController@store']);

Route::get('/logout', [
	'as'    => 'logout_path',
	'uses'  => 'LoginController@logout']);

Route::group(array('before' => 'auth'), function() {
	Route::group( array( 'prefix' => 'admin' ), function () {
		Route::get('', function () {
			return Redirect::to( 'admin/dashboard' );});
		Route::get( 'dashboard', array( "as" => "dashboard", "uses" => 'Admin_AdminController@dashboard' ) );
		/*
		 * Spot Section
		 */
		Route::get('spot',[
			'as'    => 'spot_admin_path',
			'uses'  => 'Admin_SpotController@index']);
		Route::post('spot/new', [
			'as'    => 'new_spot_admin_path',
			'uses'  => 'Admin_SpotController@store']);
		/*
		 * Tag Section
		 */
		Route::get('tag',[
			'as'    => 'tag_admin_path',
			'uses'  => 'Admin_TagController@index']);
		Route::post('tag/new', [
			'as'    => 'new_tag_admin_path',
			'uses'  => 'Admin_TagController@store']);
	});
});

Route::group(['prefix' => 'js'], function(){
	Route::get('tags/{tag}', function($tag){
		$tags = DB::table('tags')->where('tag', 'LIKE', "%$tag%")->lists('tag');
		return Response::json($tags);
	});
});