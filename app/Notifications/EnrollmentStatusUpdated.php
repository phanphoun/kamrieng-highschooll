<?php

namespace App\Notifications;

use App\Models\EnrollmentApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EnrollmentStatusUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    public EnrollmentApplication $enrollment;

    public function __construct(EnrollmentApplication $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject('Enrollment Status Updated')
            ->greeting('Your application status has been updated')
            ->line("Tracking Code: {$this->enrollment->tracking_code}")
            ->line("New Status: {$this->enrollment->status?->name_en}");

        if ($this->enrollment->remarks) {
            $mail->line("Remarks: {$this->enrollment->remarks}");
        }

        $mail->action('Track Application', route('enrollment.track', ['code' => $this->enrollment->tracking_code]));

        return $mail;
    }

    public function toArray(object $notifiable): array
    {
        return [
            'enrollment_id' => $this->enrollment->id,
            'tracking_code' => $this->enrollment->tracking_code,
            'status' => $this->enrollment->status?->name_en,
            'remarks' => $this->enrollment->remarks,
        ];
    }
}
