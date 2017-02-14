<?php

use Illuminate\Http\Request;

Route::post('/auth', 'MessagesController@auth');
Route::get('/messages', 'MessagesController@all');
Route::post('/messages', 'MessagesController@send');