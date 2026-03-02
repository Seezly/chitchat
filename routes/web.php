<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/conversation/{conversation}', [ConversationController::class, 'show'])->name('conversation.show')->middleware('auth');
Route::get('/conversation/with/{contact}', [ConversationController::class, 'conversationWith'])->name('conversation.withContact')->middleware('auth');
Route::delete('/conversation/{conversation}', [ConversationController::class, 'destroyConversation'])->name('conversation.destroy')->middleware('auth');

Route::post('/message/{conversation}', [MessageController::class, 'store'])->name('message.store')->middleware('auth', 'throttle:message');
Route::delete('/message/{conversation}', [MessageController::class, 'destroyMessages'])->name('message.destroy-messages')->middleware('auth');

Route::get('/profile', function () {
    return view('dashboard.profile');
})->middleware('auth');

Route::put('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');

Route::get('/contacts', ContactsController::class)->middleware('auth');
Route::post('/contacts', [ContactsController::class, 'store'])->middleware('auth', 'throttle:friendRequests');
Route::put('/contacts', [ContactsController::class, 'update'])->name('contact.update')->middleware('auth');

Route::get('/contacts/search', [ContactsController::class, 'search'])->name('contact.search')->middleware('auth');
