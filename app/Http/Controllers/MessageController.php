<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function countMessages()
    {
        return Message::count();
    }

    public function messages()
    {
        return Message::orderBy('created_at', 'DESC')->get();
    }

    public function message(Message $message)
    {
        return $message;
    }

    public function show()
    {
        return view('messages.show');
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'max:255'],
            'message' => ['required'],
        ]);

        $message = new Message();
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        return $message;
    }

    public function destroy(Message $message)
    {
        $message->delete();
    }
}
