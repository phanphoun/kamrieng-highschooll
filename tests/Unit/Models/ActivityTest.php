<?php

namespace Tests\Unit\Models;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_filters_published_activities()
    {
        Activity::factory()->published()->create(['title_en' => 'Published Event']);
        Activity::factory()->create([
            'status' => 'draft',
            'title_en' => 'Draft Event',
        ]);

        $published = Activity::published()->get();

        $this->assertCount(1, $published);
        $this->assertEquals('Published Event', $published->first()->title_en);
    }

    /** @test */
    public function it_excludes_non_published_activities()
    {
        Activity::factory()->create(['status' => 'draft', 'title_en' => 'Draft']);
        Activity::factory()->create(['status' => 'archived', 'title_en' => 'Archived']);

        $this->assertCount(0, Activity::published()->get());
    }

    /** @test */
    public function it_searches_by_khmer_title()
    {
        Activity::factory()->published()->create([
            'title_km' => 'ការប្រកួតកីឡា',
            'title_en' => 'Sports Competition',
        ]);

        $results = Activity::search('ការប្រកួត')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Sports Competition', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_english_description()
    {
        Activity::factory()->published()->create([
            'title_en' => 'Art Workshop',
            'description_en' => 'Students learn traditional painting techniques.',
        ]);
        Activity::factory()->published()->create([
            'title_en' => 'Music Class',
            'description_en' => 'Weekly music rehearsal.',
        ]);

        $results = Activity::search('painting')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Art Workshop', $results->first()->title_en);
    }

    /** @test */
    public function it_returns_empty_for_non_matching_search()
    {
        Activity::factory()->published()->create(['title_en' => 'Cooking Class']);

        $this->assertCount(0, Activity::search('nonexistentxyz')->get());
    }
}
