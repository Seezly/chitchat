<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'accepted_at',
        'rejected_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
