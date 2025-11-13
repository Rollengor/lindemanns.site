<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    require __DIR__ . '/admin.php';
});

Route::group(['namespace' => 'Public'], function () {
    require __DIR__ . '/public.php';
});
