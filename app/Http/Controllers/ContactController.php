<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:190'],
            'subject' => ['required', 'string', 'max:190'],
            'message' => ['required', 'string'],
        ]);

        // Save in DB
        $contact = Contact::create($data);

        $recipient = env('CONTACT_RECIPIENT', 'admin@yubin.team2lesgo.site');
        Mail::to($recipient)->send(new ContactMessageMail($data));

        // Send to the email entered in the form
        Mail::to($data['email'])->send(new ContactMessageMail($data));

        return back()->with('success', 'Thanks! Your message has been sent.');
    }
}
