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

Route::group(['namespace'=>'Admin','middleware' => 'auth:admin'], function() {


    // Main route Dashboard & logout .
    Route::get('/', 'DashboardController@index') -> name('admin.dashboard');
    Route::get('logout' ,'LoginController@logout')-> name('admin.logout');

    ######################### Begin Users Route ########################
    Route::group(['prefix' => 'users'], function () {
        Route::get('/','AdminController@index') -> name('admin.users');
        Route::get('create','AdminController@create') -> name('admin.users.create');
        Route::post('store','AdminController@store') -> name('admin.users.store');

        Route::get('edit/{id}','AdminController@edit') -> name('admin.users.edit');
        Route::post('update','AdminController@update') -> name('admin.users.update');

        Route::get('delete/{id}','AdminController@destroy') -> name('admin.users.delete');


    });
    ######################### End Users Route ########################

    ######################### Begin branches Routes ########################
    Route::group(['prefix' => 'branches'], function () {
        Route::get('/','BranchController@index') -> name('admin.branch');
        Route::get('create','BranchController@create') -> name('admin.branch.create');
        Route::post('store','BranchController@store') -> name('admin.branch.store');
        Route::get('edit/{id}','BranchController@edit') -> name('admin.branch.edit');
        Route::get('print/','BranchController@print') -> name('admin.branch.print');
        Route::post('update','BranchController@update') -> name('admin.branch.update');
        Route::get('delete/{id}','BranchController@destroy') -> name('admin.branch.delete');
    });
    ######################### End  branches Routes  ########################

    ######################### Begin employees Routes ########################
    Route::group(['prefix' => 'employees'], function () {
        Route::get('/','EmployeeController@index') -> name('admin.emp');
        Route::get('create','EmployeeController@create') -> name('admin.emp.create');
        Route::post('store','EmployeeController@store') -> name('admin.emp.store');
        Route::get('edit/{id}','EmployeeController@edit') -> name('admin.emp.edit');
        Route::get('print/','EmployeeController@print') -> name('admin.emp.print');
        Route::post('update','EmployeeController@update') -> name('admin.emp.update');
        Route::get('delete/{id}','EmployeeController@destroy') -> name('admin.emp.delete');
    });
    ######################### End  employees Routes  ########################


});


Route::get('lang' ,function(){
   return app()->getLocale();
});


Route::group(['namespace'=>'Admin','middleware' => 'guest:admin'], function(){
     Route::get('login' ,'LoginController@getLogin')-> name('get.admin.login');
     Route::post('login' ,'LoginController@login') -> name('admin.login');
});


