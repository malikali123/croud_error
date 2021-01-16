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
Auth::routes();
Route::get('/', 'Admin\DashboardController@main') -> name('main');
Route::get('/home', 'Admin\DashboardController@home') -> name('main');

Route::group(['middleware' => 'auth:web'], function() {

    // agency branches opreation here (^_^) `>


    ////////////////// begin mony transfer routes ///////////////////////////
    Route::group(['prefix' => 'transfer'], function () {
        Route::get('/', 'TransferController@index')->name('branch.transfer');
        Route::get('create', 'TransferController@create')->name('branch.transfer.create');
        Route::post('store', 'TransferController@store')->name('branch.transfer.store');
        Route::get('edit/{id}', 'TransferController@edit')->name('branch.transfer.edit');
        Route::post('update/{id}', 'TransferController@update')->name('branch.transfer.update');
        Route::get('delete/{id}', 'TransferController@distroy')->name('branch.transfer.delete');

    });
    //////////////////// end mony transfer routes ///////////////////////////

});
