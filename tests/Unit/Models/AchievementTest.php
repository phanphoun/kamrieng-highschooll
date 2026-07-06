<?php

namespace Tests\Unit\Models;

use App\Models\Achievement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AchievementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_searches_by_khmer_title()
    {
        Achievement::factory()->create([
            'title_km' => 'ជើងឯកប្រឡងគណិតវិទ្យា',
            'title_en' => 'Math Olympiad Champion',
        ]);
        Achievement::factory()->create([
            'title_km' => 'ជើងឯកប្រឡងភាសាខ្មែរ',
            'title_en' => 'Khmer Literature Champion',
        ]);

        $results = Achievement::search('គណិតវិទ្យា')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Math Olympiad Champion', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_english_title()
    {
        Achievement::factory()->create([
            'title_en' => 'National Science Award',
        ]);
        Achievement::factory()->create([
            'title_en' => 'Best Athlete Trophy',
        ]);

        $results = Achievement::search('Science')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('National Science Award', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_description()
    {
        Achievement::factory()->create([
            'title_en' => 'Robotics Competition',
            'description' => 'Students won first place in the national robotics competition.',
        ]);
        Achievement::factory()->create([
            'title_en' => 'Art Exhibition',
            'description' => 'Student paintings displayed at the provincial gallery.',
        ]);

        $results = Achievement::search('robotics')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Robotics Competition', $results->first()->title_en);
    }

    /** @test */
    public function it_returns_empty_for_non_matching_search()
    {
        Achievement::factory()->create(['title_en' => 'School Award']);

        $this->assertCount(0, Achievement::search('zzzzznonexistent')->get());
    }
}
