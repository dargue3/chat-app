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

Route::get('/logout', function() {
  Auth::logout();
  return redirect('/login');
});

Auth::routes();

// all non-api traffic gets routed to the homepage where vue-router takes over
Route::any('/{any}', function () {
  return view('master');
})->where('any', '.*');
