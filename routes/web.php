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


Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'logoutController@index');

Route::group(['middleware'=>['sess']], function(){
    Route::resource('admin','AdminController')->only('index');
    Route::resource('manager','ManagerController')->only('index');
    Route::Resources([
        'user' => 'UserController',
        'bus' => 'BusController',
        'buscounter' => 'BusCounterController',
        'schedule' => 'ScheduleController'

    ]);
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/user/userlist','UserController@userlist')->name('user.userlist');
    Route::post('/user/updateuser/{id}', 'UserController@updateuser')->name('user.updateuser');
    Route::post('/user/edit/{id}', 'UserController@updateuser');
    Route::post('/user/delete/{user}', 'UserController@delete')->name('user.delete');
    Route::get('/bus/showall', 'BusController@showall')->name('bus.showall');
    Route::get('/buscounter/showall', 'BusCounterControllerr@showall')->name('buscounter.showall');
    Route::get('/schedule/showall', 'ScheduleController@showall')->name('schedule.showall');
});