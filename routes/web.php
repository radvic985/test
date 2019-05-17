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
    return redirect()->route('workshop-booking');
});
Route::match(['get', 'post'], '/workshop-booking', 'BookingController@bookings')->name('workshop-booking');
Route::post('/ajax/spots-number', 'BookingController@getSpotNumber');
Route::post('/ajax/book-workshop', 'BookingController@bookWorkshop');

