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

Route::get('/', 'SignaturesController@index')->name('home');

Route::get('sign', 'SignaturesController@index')->name('sign');
Route::get('signature/{signature}', 'SignaturesController@index')->name('show');
#Route::get('sign', 'SignaturesController@create')->name('sign');
#Route::get('signature/{signature}', 'SignaturesController@show')->name('show');

Route::get('screens', 'SignaturesController@index')->name('screens');
Route::get('screen/add', 'SignaturesController@index')->name('screen.add');
Route::get('screen/{screen}', 'SignaturesController@index')->name('screen.show');

// Add event to pusher
Route::get('testchannel', function(){
	$res = event(new App\Events\SignatureAdded('test'));
	dd($res);
    return "Event has been sent!";
});

// Template test
Route::get('template', function(){
	return view('template');
});