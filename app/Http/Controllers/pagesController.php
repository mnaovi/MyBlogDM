<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Post;
use Session;

class pagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getIndex()
    {
        $posts = Post::orderBy('created_at','desc')->take(4)->get();
    	return view('user.home',compact('posts'));
    }

    public function getAbout()
    {
    	return view('user.about');
    }

    public function getContact()
    {
    	return view('user.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request,[
          
          'email'      => 'required|email',
          'message'    => 'required|min:10',
          'subject'    => 'required|min:3'

           ]);

          $data = array(
             'email'          => $request->email,
             'bodymessage'    => $request->message,
             'subject'        => $request->subject

          );


          Mail::send('emails.contact', $data, function($message) use($data){
            $message->from($data['email']);
            $message->to('mohammadnazmulahsanovi@gmail.com');
            $message->subject($data['subject']);

          });
       
       Session::flash('success','Your mail was successfully sent');

       return redirect(url('/'));

       
    }
}
