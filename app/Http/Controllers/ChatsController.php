<?php

namespace Dockable\Http\Controllers;

use Dockable\Message;
use Dockable\User;
use Dockable\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        /**
         * requeres that the acessing user is
         * authenticaed.
         */
      $this->middleware('auth');
    }

    public function index()
    {
        /**
         * returns the messaging home
         * screen.
         */
        $contacts = $this->getContacts();

        return view('chats.index', compact('contacts'));
    }

    public function getContacts()
    {
        /**
         * returns all the contacts for a given loged in user.
         */
        $contacts = Message::where('from_user', '=', Auth::user()->username)->distinct('to_user')->pluck('to_user');
        $contacts = $contacts->merge(Message::Where('to_user', '=', Auth::user()->username)->distinct('from_user')->pluck('from_user'))->unique();
        return $contacts;
    }

    public function getAllMessages($username)
    {
        /**
         * retrieves all the messages between a given authenticated user
         * as well as the given contact.
         */
        $messages = $this->getRecievedMessages($username);
        $messages = $messages->merge($this->getSentMessages($username))->sortBy('created_at')->reverse();

        return view('chats.openChat', compact('messages', 'username'));
    }

    public function getRecievedMessages($username)
    {
        //retrieves all the messages sent to the authenticated user
        return Message::where('to_user', '=', Auth::user()->username)->where('from_user', '=', $username)->get();
    }

    public function getSentMessages($username)
    {
        //retrieves all the messages sent by the authenticated user
        return Message::where('from_user', '=', Auth::user()->username)->where('to_user', '=', $username)->get();
    }

    public function sendMessage(Request $request)
    {
        //Sends a message to a given user

        $this->validate(request(), [
            'username' => 'required|exists:users,username',
            'message' => 'required'
        ]);

        $user = request('username');

        Message::create([
            'from_user' => Auth::user()->username,
            'to_user' => $user,
            'message' => request('message')
        ]);

      return redirect('/chats')->with('message', $user);
    }
}

