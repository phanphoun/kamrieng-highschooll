<?php

namespace App\Console\Commands;

use App\Models\ApplicationStatus;
use App\Models\EnrollmentApplication;
use Illuminate\Console\Command;

class SyncApplicationStatuses extends Command
{
    protected $signature = 'enrollments:sync-statuses';

    protected $description = 'Sync enrollment application statuses';

    public function handle(): void
    {
        $defaultStatus = ApplicationStatus::where('is_default', true)->first();

        if (! $defaultStatus) {
            $this->error('No default application status found. Please seed statuses first.');

            return;
        }

        $count = EnrollmentApplication::whereNull('status_id')->update([
            'status_id' => $defaultStatus->id,
        ]);

        $this->info("Updated {$count} application(s) with the default status.");
    }
}
