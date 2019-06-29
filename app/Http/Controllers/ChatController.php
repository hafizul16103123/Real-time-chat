<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\ChatEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function chat()
    {
        return view('chat');
    }
    public function send(Request $request)
    {
    
        $user=User::find(Auth::id());
        $this->saveToSession($request);
        event( new ChatEvent($user,$request->message));
    }
    public function saveToSession($request)
    {
        session()->put('chat',$request->message);
    }
}
