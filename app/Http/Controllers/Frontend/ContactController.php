<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactForm;
use Mail;

class ContactController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = $this->menu;
        return view('contact', compact('menu'));
    }

    public function send(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;        
        if ($contact->save()) {
            Mail::to(config('mail.from.address'))->send(new ContactForm($contact));
            return redirect(route('frontend.contact'))->with('success', 'Your new message has been sent!');
        }
        $error = $contact->errors()->all(':message');
        return redirect(route('frontend.contact'))->with('error', $error)->withInput();
    }
}
