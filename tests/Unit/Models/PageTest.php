<?php

namespace Tests\Unit\Models;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_searches_by_khmer_title()
    {
        Page::factory()->create([
            'title_km' => 'ប្រវត្តិសាលា',
            'title_en' => 'School History',
        ]);
        Page::factory()->create([
            'title_km' => 'កម្មវិធីសិក្សា',
            'title_en' => 'Curriculum',
        ]);

        $results = Page::search('ប្រវត្តិ')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('School History', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_english_body()
    {
        Page::factory()->create([
            'title_en' => 'About Us',
            'body_en' => 'Our school was founded in 2010 with a mission to provide quality education.',
        ]);
        Page::factory()->create([
            'title_en' => 'Contact',
            'body_en' => 'Get in touch with us.',
        ]);

        $results = Page::search('founded in 2010')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('About Us', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_khmer_body()
    {
        Page::factory()->create([
            'title_en' => 'Admissions',
            'body_km' => 'ព័ត៌មានអំពីការចុះឈ្មោះចូលរៀន',
        ]);

        $results = Page::search('ចុះឈ្មោះ')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Admissions', $results->first()->title_en);
    }

    /** @test */
    public function it_returns_empty_for_non_matching_search()
    {
        Page::factory()->create(['title_en' => 'School Information']);

        $this->assertCount(0, Page::search('nonexistentquery')->get());
    }
}
