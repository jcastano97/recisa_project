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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    if(Auth()->user() != null) {
        return redirect()->route('client.index');
    } else {
        return redirect()->route('login');
    }
});
Route::get('/home', function () {
    if(Auth()->user() != null) {
        return redirect()->route('client.index');
    } else {
        return redirect()->route('login');
    }
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('client', 'ClientController');

    Route::resource('purchase', 'PurchaseController');
});