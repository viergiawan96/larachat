<?php

use Illuminate\Http\Request;

Route::post('getuser', 'chatController@getuser');

Route::post('filmsg', 'chatController@filmsg');

Route::post('sendMsg', 'chatController@sendMsg');