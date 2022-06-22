<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'BroadcastController@index');

Route::get('/execute-public-event', 'BroadcastController@executePublicEvent')
    ->name('execute-public-event');

Route::get('/execute-private-event', 'BroadcastController@executePrivateEvent')
    ->name('execute-private-event');

Route::get('/room', 'BroadcastController@room')
    ->name('room');
