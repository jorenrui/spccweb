<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Message;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tot_posts = count(Post::all());

        return view('messages.contact')->with('tot_posts', $tot_posts);
    }

    public function feedback()
    {
        $search = null;

        if( request()->has('search')) {
            $search = request('search');
            $messages = Message::where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->orWhere('subject', 'like', '%'.$search.'%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);
            $messages->appends(['search' => $search]);
        } else {
            $messages = Message::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('messages.feedback')
                ->with('messages', $messages)
                ->with('search', $search);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable',
            'subject' => 'required',
            'body' => 'nullable',
        ]);

        // Add Message
        $msg = new Message;
        $msg->name = $request->input('name');
        $msg->email = $request->input('email');
        $msg->subject = $request->input('subject');
        $msg->body = $request->input('body');
        $msg->save();

        return redirect('/contact/sent');
    }

    public function messageSent()
    {
        return view('messages.message_sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $msg = Message::find($id);

        return view('messages.show')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = Message::find($id);

        $msg->delete();

        return redirect('/feedback')->with('success', 'Message Removed');
    }
}
