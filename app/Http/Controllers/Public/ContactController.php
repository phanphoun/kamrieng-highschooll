<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\User;
use App\Notifications\ContactAutoReply;
use App\Notifications\ContactMessageReceived;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return view('public.pages.contact');
    }

    /**
     * Store a new contact message.
     */
    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();

        $message = ContactMessage::create($validated);

        // Notify admins
        $admins = User::role('admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new ContactMessageReceived($message));
        }

        // Auto-reply to sender
        Notification::route('mail', $message->email)->notify(new ContactAutoReply($message));

        return redirect()->route('contact')
            ->with('success', __('messages.contact_success'));
    }
}
