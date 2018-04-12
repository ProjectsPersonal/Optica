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



/*
*Route login and logout - Authentication view & methods
*/
  Route::get( 'login',  ['as' => 'login','uses' => 'Auth\LoginController@showLoginForm']);
  Route::post('/login',  ['as' => '/login','uses' => 'Auth\LoginController@login']);
  Route::get('/logout',  ['as' => '/logout','uses' => 'Auth\LoginController@logout']);
  Route::get('logouttemp',['as' => 'logouttemp','uses' => 'AccessController@logout']);

/*
*Route middleware all users
*/
  Route::group(['middleware' => 'auth'], function (){
    //Custom routes
    Route::name('sold.report')->get('sold/report','SoldController@report');
    Route::name('sold.graphic')->get('sold/graphics','SoldController@graphics');
    Route::name('sold.inventory')->get('sold/inventory','SoldController@inventory');
    Route::name('sold.smaller')->get('sold/smaller_sales','SoldController@smaller');
    Route::name('admin.calendar')->get('admin/calendar','AdminController@calendar');
    Route::name('admin.admin')->get('admin/admin','AdminController@admin');
    Route::name('admin.expenses')->get('admin/expense','AdminController@expense');
    Route::name('admin.expstore')->post('admin/expense/store','AdminController@expensestore');
    Route::name('admin.expdelete')->post('admin/expense/delete','AdminController@deleteexpense');
    Route::name('admin.expupdate')->post('admin/expense/update','AdminController@expenseupdate');
    Route::name('admin.debts')->get('admin/debt','AdminController@debt');
    Route::name('admin.employees')->get('admin/employees','AdminController@employees');
    Route::name('admin.diary')->get('admin/diary_book','AdminController@diary');
    Route::name('admin.canceled')->post('admin/diary_book/control/cancelled','AdminController@canceled');
    Route::name('admuser.store')->post('admin/employees/store','AdminController@storeemployees');
    Route::name('recipe.getter')->get('recipe/get','RecipeController@getter');
    Route::name('recipe.setter')->get('recipe/set/{id}','RecipeController@setter');
    Route::name('recipe.end')->post('recipe/end','RecipeController@endrecipe');
    Route::name('pdf')->post('pdf','PdfController@pdf');
    Route::name('pdf.end')->post('pdf/end','PdfController@end');
    Route::name('pdf.diary')->get('pdf/diary_book','PdfController@diary');
    Route::get('ticket_print/{id}','PdfController@ticket_array');
    Route::get('admin/employees/pdf/{id}','PdfController@employees');
    Route::name('admin.storeclient')->post('admin/storeclient','AdminController@storeclient');
    Route::name('admin.adminsale')->post('admin/adminsale','AdminController@adminsale');
    Route::name('admin.storesale')->post('admin/storesale','AdminController@storesale');
    Route::name('admin.storearray')->post('admin/storearray','AdminController@storearray');
    Route::name('admin.storeuser')->post('admin/storeuser','AdminController@storeuser');
    Route::name('admin.storeexpense')->post('admin/storeexpense','AdminController@storeexpense');
    Route::name('admin.storedebt')->post('admin/storedebt','AdminController@storedebt');
    Route::name('admin.storeevent')->post('admin/storeevent','AdminController@storeevent');

    Route::name('admin.deleteclient')->post('admin/deleteclient','AdminController@deleteclient');
    Route::name('admin.updateclient')->post('admin/updateclient','AdminController@updateclient');
    Route::name('admin.deletesale')->post('admin/deletesale','AdminController@deletesale');
    Route::name('admin.updatesale')->post('admin/updatesale','AdminController@updatesale');
    Route::name('admin.deletearray')->post('admin/deletearray','AdminController@deletearray');
    Route::name('admin.updatearray')->post('admin/updatearray','AdminController@updatearray');
    Route::name('admin.deleteuser')->post('admin/deleteuser','AdminController@deleteuser');
    Route::name('admin.deletegasto')->post('admin/deletegasto','AdminController@deletegasto');
    Route::name('admin.updateexpense')->post('admin/updateexpense','AdminController@updateexpense');
    Route::name('admin.deletedebt')->post('admin/deletedebt','AdminController@deletedebt');
    Route::name('admin.updatedebt')->post('admin/updatedebt','AdminController@updatedebt');
    Route::name('admin.deleteevent')->post('admin/deleteevent','AdminController@deleteevent');
    Route::name('admin.updateevent')->post('admin/updateevent','AdminController@updateevent');

    //ajax
    Route::post('admin/getTime','AdminController@getTime');
    Route::post('sold/getProducts','SoldController@getProducts');

    Route::name('client.history')->get('client/history','ClientController@history');

    Route::name('ticketfast.store')->post('fast/store','TicketsController@fast');
    //General routes of CRUD
    Route::resource('/','HomeController');
    Route::resource('client','ClientController');
    Route::resource('sold','SoldController');
    Route::resource('sales','SalesController');
    Route::resource('discount','DiscountController');
    Route::resource('arrangement','ArrangementController');
    Route::resource('admin','AdminController');
    Route::resource('calendar','CalendarController');
    Route::resource('ticket','TicketsController');
    Route::resource('recipe','RecipeController');
    Route::resource('product','ProductController');
    /*
    route general settings
    */
    Route::resource('changepassword','GeneralSettingsController');
  });
