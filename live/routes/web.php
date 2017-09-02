<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Admin'],function(){

	Route::get('admin','AdminDashboardController@getLogin');
	Route::get('admin/dashboard','AdminDashboardController@index');
	Route::post('admin/login','AdminDashboardController@postLogin');
	Route::get('admin/logout','AdminDashboardController@logout');
	Route::get('admin/taxi-booking','AdminDashboardController@getListofBookedTaxi');
	Route::delete('admin/taxi-booking/destroy/{id}','AdminDashboardController@destroyBookings');
	Route::get('admin/client','AdminClientController@getAllClientList');
	Route::get('admin/client/edit/{id}','AdminClientController@editClientInfo');
	Route::post('admin/client/edit/{id}','AdminClientController@updateClientDetails');
	Route::post('admin/client/destroy/{id}','AdminClientController@deleteClient');
	Route::get('admin/compose-mail','AdminDashboardController@composeNewMail');
	Route::get('admin/mail-sent','AdminDashboardController@getSentMailList');
	Route::post('admin/send-mail-to-driver','AdminDashboardController@sendMailToDriver');
	Route::delete('admin/mail-sent/destroy/{id}','AdminDashboardController@destroySentMail');
	Route::get('admin/user','AdminController@index');
	Route::get('admin/user/create','AdminController@createAdmin');
	Route::post('admin/user/save-user','AdminController@storeAdmin');
	Route::get('admin/user/edit/{id}','AdminController@editAdmin');
	Route::post('admin/user/update/{id}','AdminController@updateAdmin');
	Route::delete('admin/user/destroy/{id}','AdminController@destroyAdmin');
	Route::get('admin/driver','AdminDriverController@getDriversList');
	Route::get('admin/driver/create','AdminDriverController@createDriverForm');
	Route::post('admin/driver/register','AdminDriverController@postDriverForm');
	Route::get('admin/driver/edit/{id}','AdminDriverController@editDriver');
	Route::post('admin/driver/update/{id}','AdminDriverController@updateDriver');
	Route::delete('admin/driver/destroy/{id}','AdminDriverController@destroyDriver');
	Route::get('admin/contact','ContactController@getContactForm');
	Route::post('admin/contact/post-contact','ContactController@createUpdateForm');
	Route::get('admin/taxi-fare','FareController@getTaxiFare');
	Route::post('admin/taxi-fare/post-fare','FareController@postTaxiFare');
	Route::get('admin/profile','AdminController@adminProfile');
	Route::post('admin/profile/change-password/{id}','AdminController@updatePassword');
});

Route::group(['namespace'=>'Client'],function(){
	Route::get('client',function(){
		return redirect('client/login');
	});
	Route::get('client/register','ClientController@registerClientLogin');
	Route::get('client/login','ClientController@getClientLogin');
	Route::post('client/post-client-data','ClientController@postClientRegistration');
	Route::post('client/login','ClientController@postClientLogin');
	Route::get('client/logout','ClientController@clientLogout');
});

Route::group(['namespace'=>'Driver'],function(){
	Route::get('driver',function(){
		return redirect('driver/login');
	});
	Route::get('driver/login','DriverController@getDriverLogin');
	Route::get('driver/register','DriverController@getDriverSignup');
	Route::get('driver/dashboard','DriverController@index');
	Route::post('driver/post-login','DriverController@postDriverLogin');
	Route::get('driver/user','DriverController@listDriver');
	Route::post('driver/post-driver','DriverController@postDriverRegistration');
	Route::get('driver/user/edit/{id}','DriverController@editDriver');
	Route::post('driver/user/update/{id}','DriverController@updateDriver');
	Route::get('driver/logout','DriverController@driverLogout');
	Route::get('driver/mail/inbox','DriverController@listAllMail');
	Route::post('driver/mail/status-update/{id}','DriverController@updateMailStatusForDriverMail');
	Route::get('driver/profile','DriverController@driverProfile');
	Route::post('driver/profile/change-password/{id}','DriverController@updatePassword');
});
Route::group(['namespace'=>'Frontend'],function(){
	Route::get('/','FrontendController@getFrontview');
	Route::get('/home','FrontendController@getFrontview');
	Route::get('taxi-fare','FrontendController@fareCalculation');
	Route::get('taxi-booking',['as'=>'taxi.booking','uses'=>'FrontendController@taxiBooking']);
	/*Route::get('route', ['as' => 'route.name', 'uses' => 'SomeController@SomeAction']);*/
	Route::post('taxi-booking','FrontendController@postTaxiBooking');
});

Auth::routes();


