<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Msg;

class MessagesController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);


        //create message
        $message = new Msg;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');

        //save to db
        $message->save();

        //redirect
        return redirect('/')->with('success', 'Message Sent');        
    }

    public function getMessages(Request $request) {
        $messages = Msg::all();

        return view('messages')->with('msgs', $messages);
    }
}
