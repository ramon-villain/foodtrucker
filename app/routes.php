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

Route::post('/newsletter', [
	'as'    => 'newsletter_path',
	'uses'  => 'HomeController@newsletter']);

Route::get('/login', [
	'as'    => 'login_path',
	'uses'  => 'LoginController@index']);

Route::post('/login', [
	'as'    => 'login_path',
	'uses'  => 'LoginController@store']);

Route::get('/logout', [
	'as'    => 'logout_path',
	'uses'  => 'LoginController@logout']);


Route::get('/contato', [
	'as'    => 'contato_path',
	'uses'  => 'PagesController@contato_index']);

Route::post('/contato', [
	'as'    => 'contato_path',
	'uses'  => 'PagesController@contato_post']);

Route::get('/sobre-nos', [
	'as'    => 'sobre_path',
	'uses'  => 'PagesController@sobre_index']);

Route::get('/eventos', [
	'as'    => 'eventos_path',
	'uses'  => 'PagesController@eventos_index']);

Route::group(array('before' => 'auth'), function() {
	Route::group( array( 'prefix' => 'admin' ), function () {
		Route::get('', function () {
			return Redirect::to( 'admin/dashboard' );});
		Route::get( 'dashboard', array( "as" => "dashboard", "uses" => 'Admin_AdminController@dashboard' ) );
		/*
		 * Truck Section
		 */
		Route::get('truck',[
			'as'    => 'truck_admin_path',
			'uses'  => 'Admin_TruckController@index']);
		Route::post('truck', [
			'as'    => 'new_truck_admin_path',
			'uses'  => 'Admin_TruckController@store']);
		Route::get('truck/{id}/edit',[
			'as'    => 'edit_truck_admin_path',
			'uses'  => 'Admin_TruckController@edit']);
		Route::post('truck/{id}/edit',[
			'as'    => 'edit_truck_admin_path',
			'uses'  => 'Admin_TruckController@update']);
		/*
		 * Spot Section
		 */
		Route::get('spot',[
			'as'    => 'spot_admin_path',
			'uses'  => 'Admin_SpotController@index']);
		Route::post('spot', [
			'as'    => 'new_spot_admin_path',
			'uses'  => 'Admin_SpotController@store']);
		Route::get('spot/{id}/edit',[
			'as'    => 'edit_spot_admin_path',
			'uses'  => 'Admin_SpotController@edit']);
		Route::post('spot/{id}/edit',[
			'as'    => 'edit_spot_admin_path',
			'uses'  => 'Admin_SpotController@update']);
		/*
		 * Tag Section
		 */
		Route::get('tag',[
			'as'    => 'tag_admin_path',
			'uses'  => 'Admin_TagController@index']);
		Route::post('tag', [
			'as'    => 'new_tag_admin_path',
			'uses'  => 'Admin_TagController@store']);
		Route::post('tag/new-truck', [
			'as'    => 'new_tag_truck_admin_path',
			'uses'  => 'Admin_TagController@storeTruck']);
		/*
		 * Configuration Section
		 */
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
		/*
		 * Blog Section
		 */
		Route::get('blog',[
			'as'    => 'blog_admin_path',
			'uses'  => 'Admin_BlogController@index']);
		Route::post('post/new', [
			'as'    => 'new_post_admin_path',
			'uses'  => 'Admin_BlogController@store']);
		Route::get('post/{id}/edit',[
			'as'    => 'edit_post_admin_path',
			'uses'  => 'Admin_BlogController@edit']);
		Route::post('post/{id}/edit',[
			'as'    => 'edit_post_admin_path',
			'uses'  => 'Admin_BlogController@update']);
		/*
		 * Sobre Nós Section
		 */
		Route::get('sobre',[
			'as'    => 'sobre_admin_path',
			'uses'  => 'Admin_SobreController@index']);
		Route::post('sobre', [
			'as'    => 'sobre_admin_path',
			'uses'  => 'Admin_SobreController@store']);
		/*
		 * Evento Section
		 */
		Route::get('evento',[
			'as'    => 'evento_admin_path',
			'uses'  => 'Admin_EventoController@index']);
		Route::post('evento', [
			'as'    => 'new_evento_admin_path',
			'uses'  => 'Admin_EventoController@store']);
		Route::get('evento/{id}/edit',[
			'as'    => 'edit_evento_admin_path',
			'uses'  => 'Admin_EventoController@edit']);
		Route::post('evento/{id}/edit',[
			'as'    => 'edit_evento_admin_path',
			'uses'  => 'Admin_EventoController@update']);
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

