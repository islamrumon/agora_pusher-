<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::whereNot('id', [Auth::id()])->get();
        // return $user;
        return view('home', compact('users'));
    }

    public function chatStart($id)
    {
        $authId = Auth::id();
        $toUser = User::findOrfail($id);
        $new = false;
        $chat = ChatRoom::where('form_user_id', $id)->where('to_user_id', $authId)->first();
        if ($chat == null) {
            $chat = ChatRoom::where('to_user_id', $id)->where('form_user_id', $authId)->first();
            if ($chat == null) {
                $new = true;
            }
        }

        if($new){
            $chat = new ChatRoom();
            $chat->name = 'Start Chat';
            $chat->form_user_id = $authId;
            $chat->to_user_id = $id;
            $chat->save();
        }
        return view('chatbox',compact('chat','toUser'));
    }
}
