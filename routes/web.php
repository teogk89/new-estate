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

Route::get('/ees', function () {
    return view('welcome');
});





Route::get('/test','MainController@test');




Route::group(['middleware'=>['auth']],function(){

	Route::get('/','MainController@index');
	Route::get('/transaction','MainController@transaction')->name('new-transaction');
	Route::post('/saveStep','MainController@saveStep');
	Route::post('/upload','MainController@uploadFile');

	Route::get('/home', 'HomeController@index')->name('home');

	Route::post('/transaction/save','MainController@saveTransaction')->name('save-transaction');
	Route::post('/transaction/submit/{id}','MainController@submitTrans')->name('submit-transaction');

	Route::get('/transaction/edit/{id}','MainController@editTransaction')->name('edit-transaction');
	Route::get('/client/{id}','ApiController@getClient');


	Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
	Route::get('/customer','HomeController@customers')->name("customer");
	Route::get('/customer/edit/{id?}','HomeController@customerEdit')->name("customer-edit");
	Route::post('/customer/save','HomeController@customerSave')->name("customer-save");
	Route::post('/delete-file','ApiController@deleteFile')->name('delete-file');
	Route::get('/user/calendar','HomeController@userCalendar')->name("user-calendar");
	Route::get("/user/calendar/feed",'ApiController@calendarFeed')->name("user-calendar-feed");
	Route::get("/account","HomeController@accountView")->name("user-account-view");
	Route::post("/account/save","HomeController@accountSave")->name("user-account-save");

	Route::post("/api/delete/{type}/{id}","ApiController@delete")->name("api-delete");
});



Route::group(['middleware'=>['auth','admin']],function(){


	Route::get('/admin/transactions','AdminController@transaction')->name('admin-transaction');
	Route::get('/admin/transaction/view/{id}','AdminController@viewTrans')->name('admin-tranction-view-single');
	Route::get('/admin/sales','AdminController@viewSales')->name("admin-sales");

	Route::get('/admin/form','AdminController@form')->name('admin-form-view');

	Route::get('/admin/form/edit/{id?}','AdminController@formEdit')->name("admin-form-edit");

	Route::post('/admin/form/save',"AdminController@formSave")->name("admin-form-save");

	Route::get('/admin/events',"AdminController@viewEvents")->name("admin-events");
	Route::get("/admin/event/edit/{id?}",'AdminController@eventEdit')->name('admin-event-edit');

	Route::post('/admin/event/save',"AdminController@eventSave")->name("admin-event-save");
	Route::get('/admin/attend/edit/{id}',"AdminController@attendEdit")->name("admin-attend-edit");

	Route::post('/admin/attend/save',"AdminController@attendSave")->name("admin-attend-save");
	Route::get('/api/attend/{id}',"ApiController@getAttend")->name("admin-event-attend");
	Route::get('/admin/event/calendar',"AdminController@calendar")->name('admin-event-calendar');

	Route::get('/admin/sales/edit/{id?}','AdminController@salesEdit')->name("admin-sale-edit");
	Route::post('/admin/sales/save','AdminController@salesSave')->name("admin-sale-save");
	Route::post('/admin/delete/{type}/{id}','AdminController@adminDelete')->name("admin-delete");
	Route::get('/admin/calendar/feed','AdminController@calendarFeed')->name("admin-calendar-feed");
});







Auth::routes();







Route::get('/logout','HomeController@logout')->name('logout');