<?php

use src\Facade\Route;

Route::get('get/testing', 'TestController@getTest');

Route::post('post/testing', 'TestController@postTest');