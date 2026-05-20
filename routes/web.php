<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/migrate', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return 'Migrations run successfully! Output: <pre>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Error during migrations: ' . $e->getMessage();
    }
});
