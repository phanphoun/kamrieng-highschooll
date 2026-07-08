<?php

namespace App\Jobs;

use App\Models\EnrollmentApplication;
use App\Notifications\EnrollmentStatusUpdated;
use App\Notifications\EnrollmentSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Notification;

class SendEnrollmentEmail implements ShouldQueue
{
    use Queueable;

    public EnrollmentApplication $enrollment;
    public string $type;

    public function __construct(EnrollmentApplication $enrollment, string $type)
    {
        $this->enrollment = $enrollment;
        $this->type = $type;
    }

    public function handle(): void
    {
        if ($this->type === 'submitted') {
            Notification::route('mail', config('mail.from.address'))
                ->notify(new EnrollmentSubmitted($this->enrollment));
        } elseif ($this->type === 'status_updated') {
            if ($this->enrollment->email) {
                Notification::route('mail', $this->enrollment->email)
                    ->notify(new EnrollmentStatusUpdated($this->enrollment));
            }
        }
    }
}
