<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\EmailValidation;
use Illuminate\Http\Request;
use Illuminate\Validation\Concerns\FilterEmailValidation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;


class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email'=>'required|email']);
        
        Mail::to(request('email'))
            ->send(new ContactMe('Shirts'));

        return redirect('/contact')
            ->with('message', 'Email Sent');
    }
}
