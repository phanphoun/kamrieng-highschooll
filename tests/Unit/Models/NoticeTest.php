<?php

namespace Tests\Unit\Models;

use App\Models\Notice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoticeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_filters_active_notices_with_no_date_restrictions()
    {
        Notice::factory()->noDateRestrictions()->create(['title_en' => 'Always Active']);

        $active = Notice::active()->get();

        $this->assertCount(1, $active);
        $this->assertEquals('Always Active', $active->first()->title_en);
    }

    /** @test */
    public function it_filters_active_notices_within_date_range()
    {
        Notice::factory()->create(['title_en' => 'Current Notice']);

        $active = Notice::active()->get();

        $this->assertCount(1, $active);
        $this->assertEquals('Current Notice', $active->first()->title_en);
    }

    /** @test */
    public function it_returns_empty_search_for_non_matching_query()
    {
        Notice::factory()->create(['title_en' => 'Grade Update']);

        $results = Notice::search('nonexistentkeyword')->get();

        $this->assertCount(0, $results);
    }

    /** @test */
    public function it_excludes_expired_notices()
    {
        Notice::factory()->expired()->create(['title_en' => 'Expired Notice']);

        $this->assertCount(0, Notice::active()->get());
    }

    /** @test */
    public function it_excludes_upcoming_notices()
    {
        Notice::factory()->upcoming()->create(['title_en' => 'Future Notice']);

        $this->assertCount(0, Notice::active()->get());
    }

    /** @test */
    public function it_searches_by_khmer_title()
    {
        Notice::factory()->create([
            'title_km' => 'ការប្រកាសប្រឡង',
            'title_en' => 'Exam Announcement',
        ]);
        Notice::factory()->create([
            'title_km' => 'ការប្រកាសវិស្សមកាល',
            'title_en' => 'Holiday Announcement',
        ]);

        $results = Notice::search('ប្រឡង')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Exam Announcement', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_english_body()
    {
        Notice::factory()->create([
            'title_en' => 'Schedule Change',
            'body_en' => 'The school schedule has been updated for the new semester.',
        ]);

        $results = Notice::search('schedule has been updated')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Schedule Change', $results->first()->title_en);
    }

    /** @test */
    public function it_marks_urgent_notices()
    {
        $urgent = Notice::factory()->urgent()->create(['title_en' => 'Urgent Alert']);
        $normal = Notice::factory()->create(['title_en' => 'Regular Notice']);

        $this->assertTrue($urgent->is_urgent);
        $this->assertFalse($normal->is_urgent);
    }
}
