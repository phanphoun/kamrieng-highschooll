<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title_en' => 'First Day of School',
                'title_kh' => 'ថ្ងៃចូលរៀនដំបូង',
                'description_en' => 'Opening day for the 2025-2026 academic year.',
                'event_date' => '2025-09-01',
                'location' => 'School Campus',
                'type' => 'academic',
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title_en' => 'Parent-Teacher Conference',
                'title_kh' => 'សន្និសីទមាតាបិតា-គ្រូបង្រៀន',
                'description_en' => 'Quarterly meeting to discuss student progress.',
                'event_date' => '2025-10-15',
                'location' => 'School Hall',
                'type' => 'meeting',
                'is_published' => true,
            ],
        ];

        foreach ($events as $event) {
            Event::firstOrCreate(
                ['title_en' => $event['title_en'], 'event_date' => $event['event_date']],
                $event
            );
        }
    }
}
