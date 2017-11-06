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

Route::get('myaccount', function () {
    return view('user.myaccount');
});

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');


Route::delete('kiosks/{id}/detach/{user}', 'KioskController@detach');
Route::post('kiosks/{id}/attach/{user}', 'KioskController@attach');

Route::resource('kiosks', 'KioskController');


Route::resource('users', 'UserController');

//Admin routes
Route::get('/admin/kiosks', 'KiosksController@admin_index');
