<?php

namespace Tests\Unit\Models;

use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_searches_by_khmer_title()
    {
        Document::factory()->create([
            'title_km' => 'ពាក្យសុំចូលរៀន',
            'title_en' => 'Admission Application',
        ]);
        Document::factory()->create([
            'title_km' => 'វិញ្ញាបនបត្រសិក្សា',
            'title_en' => 'Academic Certificate',
        ]);

        $results = Document::search('ពាក្យសុំ')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Admission Application', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_english_title()
    {
        Document::factory()->create([
            'title_en' => 'School Policy Handbook',
        ]);
        Document::factory()->create([
            'title_en' => 'Exam Registration Form',
        ]);

        $results = Document::search('Policy')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('School Policy Handbook', $results->first()->title_en);
    }

    /** @test */
    public function it_returns_empty_for_non_matching_search()
    {
        Document::factory()->create(['title_en' => 'Student Guide']);

        $this->assertCount(0, Document::search('nonexistentquery')->get());
    }
}
