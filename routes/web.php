<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/conversation', function () {
    return view('dashboard.conversation');
})->middleware('auth');

Route::get('/profile', function () {
    return view('dashboard.profile');
})->middleware('auth');

Route::get('/contacts', function () {
    return view('dashboard.contacts');
})->middleware('auth');
