<?php

namespace Dockable;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from_user', 'to_user', 'message'];

    public function user()
    {
        //esstablishes a relationship between the message and the user model.
        return $this->belongsTo(User::class);
    }
}
