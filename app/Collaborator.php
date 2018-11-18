<?php

namespace Dockable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Collaborator extends Model
{
    protected $fillable = [
		'id', 'file_id', 'collaborator_username'
    ];

    public static function getCollaborations($id)
    {
        if($id)
            return Collaborator::whereIn('file_id', $id)->get();
        else
            return null;
    }

    public static function getMyCollaborations()
    {
        Collaborator::where('collaborator_username', Auth::user()->username)->pluck('file_id')->toArray();
    }

    public static function addCollaborator($id, $username)
	{
		Collaborator::create([
            'file_id' => $id,
            'collaborator_username' => $username
        ]);
    }

    public static function removeCollaborator($id, $username)
	{
        Collaborator::where('file_id', $id)->where('collaborator_username', $username)->delete();
    }

    public static function checkValidity($id, $username)
    {
        if(Collaborator::collaboratorExists($username) && Collaborator::collaboratorAlready($id, $username))
        {
            return true;
        }
    }

	public static function collaboratorExists($username)
	{
		$user = User::where('username', $username)->first();

		if ($user == null)
		{
			// Collaborator does not exist
			return false;
		}
		else
		{
			// Collaborator exists
			return true;
		}
	}

	public static function collaboratorAlready($id, $username)
	{
        $collaborator = Collaborator::where('file_id', $id)->where('collaborator_username', $username)->first();

		if ($collaborator || $username == strtolower(Auth::user()->username))
		{
			// Colaborator already exists for this file
			return false;
		}
		else
		{
			// This is a new collaborator
			return true;
		}
	}
}
