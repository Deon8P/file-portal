<?php

namespace Dockable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public static function swapping($user) {
        //Used to ensure that only one session per user is available

        $new_sessid   = \Session::getId(); //get new session_id after user sign in
        $last_session = \Session::getHandler()->read($user->last_sessid); // retrive last session

        if ($last_session) {
            if (\Session::getHandler()->destroy($user->last_sessid)) {
                // session was destroyed
            }
        }

        $user->last_sessid = $new_sessid;
        $user->save();
    }
}
