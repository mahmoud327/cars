<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/send', function () {

    smsV( "201123431046" , "Hello");


});


Route::group([ 'namespace' => 'Admin', 'prefix'=>'admin'], function (){

    Route::group(['namespace' => 'Auth'], function (){

        Route::get('login', 'AuthController@login')->name('admin-login');
        Route::post('login-check', 'AuthController@loginCheck')->name('login-check');

    });
    Route::group(['middleware' => 'auth:admin'], function(){

        Route::group(['namespace' => 'Auth'], function (){

            // Route::get('changepassword', 'ChangePasswordController@index')->name('changepassword.index');
            // Route::post('changepassword/update', 'ChangePasswordController@update')->name('updatepassword');
            Route::get('logout', 'AuthController@logout')->name('admin.logout');
        });


        Route::group(['namespace' => 'Main'], function (){

            //////////// Admin Module /////////////
            Route::resource('admin','AdminController');
            Route::resource('roles','RoleController');

            Route::get('/home','MainController@index')->name('admin.home');



            //////////// User Module /////////////
            Route::resource('/user','UserController');
            Route::get('/activate{id}','UserController@activate')->name('user.activate');
            Route::get('/deactivate{id}','UserController@deactivate')->name('user.deactivate');




            //////////// Office Module /////////////
            Route::resource('/office','OfficeController');
            // Route::get('/activate{id}','UserController@activate')->name('user.activate');
            // Route::get('/deactivate{id}','UserController@deactivate')->name('user.deactivate');

            /////////////////start types/////////////
            Route::resource('types','TypeController');
            Route::delete('types/destroy/all','TypeController@multi_delete');

            ////////////////////start drivrs////////////
            Route::resource('driver','DriverController');
            Route::get('drivers/activate{id}','DriverController@activate')->name('drivers.activate');
            Route::get('drivers/deactivate{id}','DriverController@deactivate')->name('drivers.deactivate');
            Route::delete('driver/destroy/all','DriverController@multi_delete');

            ////////////// start trip ///////////////
            Route::resource('trip','TripController');


        ////////////////////////////////////////////////////////////////////
         ////////////// start car ///////////////
         Route::resource('cars','CarController');
         Route::get('cars/deactivate{id}','CarController@deactivate')->name('cars.deactivate');
         Route::delete('cars/destroy/all','CarController@multi_delete');

         ////////////////////////////////////////////////////////////////////



        });

  });

});
Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix'=>'user'], function (){
        Route::resource('/user-trips', 'HomeController');
        Route::get('/create_fixed', 'HomeController@createFixed')->name('user-trips.create_fixed');
    });

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');



    Route::group([ 'namespace' => 'User', 'prefix'=>'user'], function (){
        Route::group(['namespace' => 'Main'], function (){

            //////////// Trip Module /////////////



        });
    });

});





