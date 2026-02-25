<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('joined_at', 'last_message_at', 'last_read_at', 'deleted_at');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
