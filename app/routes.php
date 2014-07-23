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
		Route::post('tag/new-truck', [
			'as'    => 'new_tag_truck_admin_path',
			'uses'  => 'Admin_TagController@storeTruck']);
		Route::get('config',[
			'as'    => 'config_admin_path',
			'uses'  => 'Admin_ConfigController@index']);
		Route::post('config/featured', [
			'as'    => 'featured_upload',
			'uses'  => 'Admin_ConfigController@featuredPost']);
		Route::post('config/featured/crop', [
			'uses'=> 'Admin_ConfigController@cropImage',
			'as'    => 'crop_upload_image']);
		Route::get('config/banners', [
			'as'    => 'add_banner_path',
			'uses'  => 'Admin_ConfigController@addBanner']);
		Route::post('config/banners', [
			'as'    => 'banner_upload',
			'uses'  => 'Admin_ConfigController@bannerPost']);
		Route::post('config/banners/crop', [
			'uses'=> 'Admin_ConfigController@cropBanner',
			'as'    => 'crop_upload_banner']);
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

Route::get('teste', [
	'uses'=> 'HomeController@teste',
	'as'    => 'upload_image']);
Route::post('teste', [
	'uses'=> 'HomeController@testeUp',
	'as'    => 'upload_image']);

