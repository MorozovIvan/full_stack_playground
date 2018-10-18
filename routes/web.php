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

Route::get('/', function () {
    return redirect('employees');
});

/**
 * Employees
 */
Route::name('employees.')->prefix('employees')->group(function () {
    Route::get('/', 'EmployeeController@index')->name('list');
    Route::get('/data', 'EmployeeController@data')->name('data');
    Route::get('/create', 'EmployeeController@create')->name('create');
    Route::post('/', 'EmployeeController@store')->name('store');

    Route::group(['prefix' => '{employee}'], function () {
        Route::get('/edit', 'EmployeeController@edit')->name('edit');
        Route::get('/', 'EmployeeController@show')->name('show');
        Route::put('/', 'EmployeeController@update')->name('update');
        Route::delete('/', 'EmployeeController@destroy')->name('destroy');
    });
});

Route::get('projects', 'EmployeeController@projectList')->name('projects');
Route::get('features', 'EmployeeController@featureList')->name('features');
