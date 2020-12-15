<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\EmailValidation;
use Illuminate\Http\Request;
use Illuminate\Validation\Concerns\FilterEmailValidation;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email'=>'required|email']);
        
        Mail::raw('it works', function ($message) {
            
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to(request('email'));
            $message->replyTo('john@johndoe.com', 'John Doe');
            $message->subject('Hello there!');
            $message->priority(3);
        });

        return redirect('/contact')
            ->with('message', 'Email Sent');
    }
}
