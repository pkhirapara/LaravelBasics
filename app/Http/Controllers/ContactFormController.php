<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        

        //Mail::to('test@test.com')->send(new ContactFormMail($data));

        return redirect('contact')->with('message', 'Thank you for your message. We will be in touch');
        
    }
}
