<?php

use Illuminate\Http\Request;

Route::get('getuser', 'chatController@getuser');

Route::post('filmsg', 'chatController@filmsg');

Route::post('sendMsg', 'chatController@sendMsg');