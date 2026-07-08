<?php

namespace App\Notifications;

use App\Models\EnrollmentApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EnrollmentSubmitted extends Notification implements ShouldQueue
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
        return (new MailMessage)
            ->subject("New Enrollment Application: {$this->enrollment->tracking_code}")
            ->greeting('New Application Received')
            ->line("Student Name: {$this->enrollment->student_name_en}")
            ->line("Grade Applying For: {$this->enrollment->grade_applying_for}")
            ->line("Tracking Code: {$this->enrollment->tracking_code}")
            ->action('Review Application', route('admin.enrollments.show', $this->enrollment));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'enrollment_id' => $this->enrollment->id,
            'tracking_code' => $this->enrollment->tracking_code,
            'student_name' => $this->enrollment->student_name_en,
            'grade' => $this->enrollment->grade_applying_for,
        ];
    }
}
