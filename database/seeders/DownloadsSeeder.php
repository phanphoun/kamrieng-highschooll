<?php

namespace Database\Seeders;

use App\Models\Download;
use Illuminate\Database\Seeder;

class DownloadsSeeder extends Seeder
{
    public function run(): void
    {
        $downloads = [
            [
                'title_en' => 'Enrollment Application Form 2025',
                'title_kh' => 'ពាក្យសុំចុះឈ្មោះចូលរៀន ២០២៥',
                'description_en' => 'Download the enrollment application form for the academic year 2025-2026.',
                'file_path' => 'downloads/enrollment-form-2025.pdf',
                'file_size' => 204800,
                'file_type' => 'pdf',
                'category' => 'forms',
                'is_published' => true,
            ],
            [
                'title_en' => 'School Calendar 2025-2026',
                'title_kh' => 'ប្រតិទិនសិក្សា ២០២៥-២០២៦',
                'description_en' => 'Download the academic calendar for the school year.',
                'file_path' => 'downloads/calendar-2025-2026.pdf',
                'file_size' => 512000,
                'file_type' => 'pdf',
                'category' => 'academic',
                'is_published' => true,
            ],
        ];

        foreach ($downloads as $download) {
            Download::firstOrCreate(
                ['title_en' => $download['title_en']],
                $download
            );
        }
    }
}
