<?php

namespace App\Notifications;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactAutoReply extends Notification
{
    use Queueable;

    public ContactMessage $message;

    public function __construct(ContactMessage $message)
    {
        $this->message = $message;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Thank you for contacting us')
            ->greeting("Dear {$this->message->name},")
            ->line('Thank you for reaching out to us. We have received your message and will get back to you as soon as possible.')
            ->line('If you have any urgent inquiries, please feel free to contact us directly by phone.');
    }
}
