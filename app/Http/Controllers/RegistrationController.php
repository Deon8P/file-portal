<?php

namespace Dockable\Http\Controllers;

use Illuminate\Http\Request;
use Dockable\User;

class RegistrationController extends Controller
{
    public function create()
    {
        /**
         * retruns the registration screen
         */
    	return view('registration.create');
    }

    public function store()
    {
        /**
         * Stores a user in the database
         * then logs the registered user in.
         */
    	$this->validate(request(), [
    		'username' => 'required|min:2|unique:users,username|alpha_num',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|confirmed|min:6'
    	]);

    	$user = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	auth()->login($user);

    	return redirect('dashboard');
        }
    }
