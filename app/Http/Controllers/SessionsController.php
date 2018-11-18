<?php

namespace Dockable\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Dockable\User;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        /**
         * returns the login screen
         */
        return view('sessions.create');
    }

    public function store(request $request)
    {
        /**
         * stores an authentication for a loged in user after validation
         * takes place.
         */
        $this->validate(request(), [
            'login' => 'required',
            'password' => 'required|min:6'
        ]);

		//Checking if the user sent an email or a string;
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

    	// Attempt user authentication
        if (!auth()->attempt($request->only($login_type, 'password'))) {
            redirect('login')->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

    /*
        if (Auth::user() != null) {
            User::swapping(Auth::user());
        }
    */
    	// If so sign them in
    	//redirect to the dashboard
        return redirect('dashboard');
    }

    public function destroy()
    {
        /**
         * logs a user out by user request.
         */
        auth()->logout();

        return redirect('/login');
    }
}
