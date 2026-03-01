<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    \Log::info('Autorizando canal user', ['user_id' => $user->id, 'id' => $id]);
    return (int) $user->id === (int) $id;
});
