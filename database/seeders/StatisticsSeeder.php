<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticsSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            ['label_en' => 'Students', 'label_kh' => 'សិស្ស', 'value' => '1200', 'icon' => 'users', 'sort_order' => 1],
            ['label_en' => 'Teachers', 'label_kh' => 'គ្រូបង្រៀន', 'value' => '85', 'icon' => 'chalkboard-user', 'sort_order' => 2],
            ['label_en' => 'Classes', 'label_kh' => 'ថ្នាក់', 'value' => '30', 'icon' => 'school', 'sort_order' => 3],
            ['label_en' => 'Years Established', 'label_kh' => 'ឆ្នាំបង្កើត', 'value' => '19', 'suffix' => '+', 'icon' => 'calendar', 'sort_order' => 4],
        ];

        foreach ($stats as $stat) {
            Statistic::firstOrCreate(
                ['label_en' => $stat['label_en']],
                $stat
            );
        }
    }
}
