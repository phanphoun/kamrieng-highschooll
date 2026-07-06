<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'nullable|string|max:20',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string',
        ]);

        // Save to database
        Message::create([
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Send email
        Mail::to('vansievmey7@gmail.com')
            ->send(new ContactMessageMail($validated));

        return back()->with(
            'success',
            'Your message has been sent successfully!'
        );
    }
    
}

