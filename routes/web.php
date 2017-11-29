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
    return redirect('/home');
});
Route::get('/status', function (\Illuminate\Http\Request $request) {
    $lockStatus = 'Account lock status: ';
    if ($request->session()->get('lockout')) {
        $lockStatus = $lockStatus.'locked';
    } else {
        $lockStatus = $lockStatus.'unlocked';
    }

    return $lockStatus;
});
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

/*
 * Kiosk user linking routes
 */view('kiosklogs');
Route::delete('kiosks/{kiosk}/detach/{user}', 'KioskController@detach');
Route::post('kiosks/{kiosk}/attach/{user}', 'KioskController@attach');

/*
 * Kiosk signout time routes
 */
Route::post('kiosks/{kiosk}/schedule', 'KioskController@addScheduleTime');
Route::delete('kiosks/{kiosk}/schedule', 'KioskController@deleteScheduleTime');

//Kiosk toggle student route
Route::post('kiosks/{kiosk}/togglestudent/{student}', 'KioskController@toggleStudent');

//Kiosk routes log
Route::get('kiosks/{kiosk}/logs', 'KioskController@logs');

//Standard kiosk route initialization
Route::resource('kiosks', 'KioskController');

Route::resource('users', 'UserController');


Route::get('urlauth/{token}', function (\Illuminate\Http\Request $request, $token) {
    if ($token === env('URL_SECRET')) {
        $request->session()->put('guest-url-auth', true);

        return redirect('/home');
    } else {
        return redirect('/login');
    }
});