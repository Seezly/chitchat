<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/profile', function () {
    return view('dashboard.profile');
});

Route::get('/contacts', function () {
    return view('dashboard.contacts');
});
