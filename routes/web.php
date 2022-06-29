<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'BroadcastController@index');

Route::get('/execute-public-event', 'BroadcastController@executePublicEvent')
    ->name('execute-public-event');

Route::get('/execute-private-event', 'BroadcastController@executePrivateEvent')
    ->name('execute-private-event');

Route::get('/room', 'RoomController@room')
    ->name('room');

Route::post('/room/send-message', 'RoomController@sendMessage')
    ->name('room.send-message');

Route::get('/notifications', 'NotificationController@index')
    ->name('notifications.index');

Route::get('/notifications/send-users-notifications', 'NotificationController@sendNotificationsToUsers')
    ->name('notifications.send');
