<?php

/*
 * Front-end URLS
 */

use Illuminate\Support\Facades\Session;

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
		Route::post('tag/new-truck', [
			'as'    => 'new_tag_truck_admin_path',
			'uses'  => 'Admin_TagController@storeTruck']);
	});
});

Route::group(['prefix' => 'js'], function(){
	Route::get('tags/{tag}', function($tag){
		$tags = DB::table('tags')->where('tag', 'LIKE', "%$tag%")->lists('tag');
		return Response::json($tags);});

	Route::get('spots/{tag}', function($spot){
		$spots = DB::table('spots')->where('id', 'LIKE', "%$spot%")->lists('id');
		return Response::json($spots);});

	Route::get('trucks/{tag}', function($truck){
		$trucks = DB::table('trucks')->where('id', 'LIKE', "%$truck%")->lists('name');
		return Response::json($trucks);});
});