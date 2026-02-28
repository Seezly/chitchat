<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'last_message_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(
                'joined_at',
                'last_message_at',
                'last_read_at',
                'deleted_at'
            );
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)
            ->latestOfMany();
    }
}
