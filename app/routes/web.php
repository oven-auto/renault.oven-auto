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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\Admin'], function() {

	Route::group(['prefix'=>'ajax','namespace'=>'Ajax'], function() {
		Route::post('/colors/pallete', 'ColorAjaxController@palette')->name('colors.palette');
		Route::post('/devices/list', 'DeviceAjaxController@list')->name('ajax.devices.list');
		Route::post('/marks/list', 'MarkAjaxController@list')->name('ajax.marks.list');
		Route::post('/motors/list', 'MotorAjaxController@list')->name('ajax.motors.list');
		Route::post('/brands/list', 'BrandAjaxController@list')->name('ajax.brands.list');
		Route::post('/options/list', 'OptionAjaxController@list')->name('ajax.options.list');
		Route::post('/colors/list', 'ColorAjaxController@list')->name('ajax.colors.list');
	});

	Route::resource('brands','BrandController');
	Route::resource('motors', 'Motor\MotorController');
	Route::resource('motortypes', 'Motor\MotorTypeController');
	Route::resource('motortransmissions', 'Motor\MotorTransmissionController');
	Route::resource('motordrivers', 'Motor\MotorDriverController');
	Route::resource('properties', 'PropertyController');
	Route::resource('marks','Mark\MarkController');
	Route::resource('bodyworks','Mark\BodyWorkController');
	Route::resource('countryproductions','Mark\CountryProductionController');
	Route::resource('colors', 'ColorController');
	Route::resource('devices', 'Device\DeviceController');
	Route::resource('typedevices', 'Device\TypeDeviceController');
	Route::resource('filterdevices', 'Device\FilterDeviceController');
	Route::resource('options', 'Option\OptionController');
	Route::resource('complectations', 'Complectation\ComplectationController');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
