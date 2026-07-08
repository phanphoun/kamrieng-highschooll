<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Http\Requests\Admin\StoreMessageReplyRequest;

class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true, 'read_at' => now()]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function reply(StoreMessageReplyRequest $request, ContactMessage $message)
    {
        $validated = $request->validated();

        $message->update([
            'reply_message' => $validated['reply_message'],
            'is_replied' => true,
            'replied_at' => now(),
            'replied_by' => auth()->id(),
        ]);

        // TODO: Send email reply to the message sender

        return redirect()->route('admin.messages.show', $message)
            ->with('success', 'Reply sent successfully.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}
