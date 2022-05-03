<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Returns count messages
     *
     * @return Integer
     * **/
    public function countMessages()
    {
        return Message::count();
    }

    /**
     * Returns list messages
     *
     * @return Object
     * **/
    public function messages()
    {
        return Message::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Returns data message
     *
     * @param Message $message data message
     * @return Object
     * **/
    public function message(Message $message)
    {
        return $message;
    }

    /**
     * Returns view contact
     *
     * @return Response|ResponseFactory
     * **/
    public function contact()
    {
        return view('contact');
    }

    /**
     * Returns view messages.show
     *
     * @return Response|ResponseFactory
     * **/
    public function show()
    {
        return view('messages.show');
    }

    /**
     * Create a new message
     *
     * @param Request $request request param received
     * **/
    public function create(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:255'],
            'message' => ['required'],
        ]);

        $message = new Message();
        $message->email = $validated['email'];
        $message->message = $validated['message'];
        $message->save();

        return $message;
    }

    /**
     * Delete a message
     *
     * @param Message $message data message
     * **/
    public function destroy(Message $message)
    {
        $message->delete();
    }
}
