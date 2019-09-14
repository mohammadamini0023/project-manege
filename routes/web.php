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

Auth::routes(['register' => false]);

Route::get('/', 'IndexController@index')->name('index');

Route::prefix('dashboard')->middleware(['auth','check-admin'])->name('admin.')->group(function (){
//    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/logout', 'DashboardController@Logout')->name('logout');
    Route::prefix('user')->name('user.')->group(function (){
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/store', 'UserController@store')->name('store');
        Route::get('/edit/{user_id}', 'UserController@edit')->name('edit');
        Route::post('/update/{user_id}', 'UserController@update')->name('update');
        Route::get('/delete/{user_id}', 'UserController@delete')->name('delete');
    });
    Route::prefix('vehicle')->name('vehicle.')->group(function (){
        Route::get('/', 'VehicleController@index')->name('index');
        Route::get('/create', 'VehicleController@create')->name('create');
        Route::post('/store', 'VehicleController@store')->name('store');
        Route::get('/edit/{vehicle_id}', 'VehicleController@edit')->name('edit');
        Route::post('/update/{vehicle_id}', 'VehicleController@update')->name('update');
        Route::get('/delete/{vehicle_id}', 'VehicleController@delete')->name('delete');
        Route::get('/status/{vehicle_id}', 'VehicleController@status')->name('status');
    });
    Route::prefix('service')->name('service.')->group(function (){
        Route::get('/', 'ServiceController@index')->name('index');
        Route::get('/create', 'ServiceController@create')->name('create');
        Route::post('/store', 'ServiceController@store')->name('store');
        Route::get('/edit/{service_id}', 'ServiceController@edit')->name('edit');
        Route::post('/update/{service_id}', 'ServiceController@update')->name('update');
        Route::get('/delete/{service_id}', 'ServiceController@delete')->name('delete');
    });
    Route::prefix('service-vehicle')->name('serviceVehicle.')->group(function (){
        Route::get('/', 'ServiceVehicleController@index')->name('index');
        Route::get('/create', 'ServiceVehicleController@create')->name('create');
        Route::post('/store', 'ServiceVehicleController@store')->name('store');
        Route::get('/edit/{service_vehicle_id}', 'ServiceVehicleController@edit')->name('edit');
        Route::post('/update/{service_vehicle_id}', 'ServiceVehicleController@update')->name('update');
        Route::get('/delete/{service_vehicle_id}', 'ServiceVehicleController@delete')->name('delete');
    });
    Route::prefix('activity')->name('activity.')->group(function (){
        Route::get('/', 'ActivityController@index')->name('index');
    });
    Route::prefix('setting')->name('setting.')->group(function (){
        Route::get('/', 'SettingController@index')->name('index');
        Route::post('/title', 'SettingController@title')->name('title');
        Route::post('/csvUpload', 'SettingController@csvUpload')->name('csvUpload');
        Route::get('/csvExportUser', 'SettingController@csvExportUser')->name('csvExportUser');
        Route::get('/csvExportService', 'SettingController@csvExportService')->name('csvExportService');
    });
    Route::prefix('search')->name('search.')->group(function (){
        Route::get('/', 'SearchController@index')->name('index');
    });
});
