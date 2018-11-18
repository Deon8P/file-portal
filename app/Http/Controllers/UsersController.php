<?php

namespace Dockable\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Dockable\File;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
    }

    public function checkRole()
    {
        //Unimplemented
        /**
         * Checks the authenticated user's role
         */
        try {
            if (Auth::check()) {
                $role_id = Auth::user()->role;
            } else {
                $role_id = null;
            }

            if ($role_id == 1) {
                return redirect('/dashboard');
            } else {
                return redirect('/login');
            }

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

    }
}
