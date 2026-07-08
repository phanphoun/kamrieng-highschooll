<?php

namespace App\Notifications;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMessageReceived extends Notification implements ShouldQueue
{
    use Queueable;

    public ContactMessage $message;

    public function __construct(ContactMessage $message)
    {
        $this->message = $message;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New Contact Message: {$this->message->subject}")
            ->greeting('New Contact Message')
            ->line("From: {$this->message->name}")
            ->line("Email: {$this->message->email}")
            ->line("Message:")
            ->line($this->message->message)
            ->action('View Message', route('admin.messages.show', $this->message));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message_id' => $this->message->id,
            'name' => $this->message->name,
            'email' => $this->message->email,
            'subject' => $this->message->subject,
        ];
    }
}
