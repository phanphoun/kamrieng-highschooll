<?php

namespace Tests\Unit\Models;

use App\Models\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GalleryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_searches_by_khmer_title()
    {
        Gallery::factory()->create([
            'title_km' => 'ពិធីបុណ្យឯកភាពជាតិ',
            'title_en' => 'National Unity Day',
        ]);
        Gallery::factory()->create([
            'title_km' => 'សកម្មភាពកីឡាសាលា',
            'title_en' => 'School Sports Day',
        ]);

        $results = Gallery::search('បុណ្យឯកភាព')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('National Unity Day', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_english_title()
    {
        Gallery::factory()->create([
            'title_en' => 'Graduation Ceremony 2025',
        ]);
        Gallery::factory()->create([
            'title_en' => 'Science Fair Exhibition',
        ]);

        $results = Gallery::search('Graduation')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Graduation Ceremony 2025', $results->first()->title_en);
    }

    /** @test */
    public function it_returns_empty_for_non_matching_search()
    {
        Gallery::factory()->create(['title_en' => 'School Album']);

        $this->assertCount(0, Gallery::search('nonexistentquery')->get());
    }
}
