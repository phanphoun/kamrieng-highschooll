<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name_en' => 'Pending', 'name_kh' => 'កំពុងរង់ចាំ', 'color' => '#f59e0b', 'sort_order' => 1, 'is_default' => true],
            ['name_en' => 'Under Review', 'name_kh' => 'កំពុងពិនិត្យ', 'color' => '#3b82f6', 'sort_order' => 2],
            ['name_en' => 'Approved', 'name_kh' => 'បានអនុម័ត', 'color' => '#10b981', 'sort_order' => 3],
            ['name_en' => 'Waitlisted', 'name_kh' => 'បញ្ជីរង់ចាំ', 'color' => '#8b5cf6', 'sort_order' => 4],
            ['name_en' => 'Rejected', 'name_kh' => 'បានបដិសេធ', 'color' => '#ef4444', 'sort_order' => 5],
            ['name_en' => 'Enrolled', 'name_kh' => 'បានចុះឈ្មោះ', 'color' => '#06b6d4', 'sort_order' => 6],
        ];

        foreach ($statuses as $status) {
            ApplicationStatus::firstOrCreate(
                ['name_en' => $status['name_en']],
                $status
            );
        }
    }
}
