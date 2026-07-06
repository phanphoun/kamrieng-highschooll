<?php

namespace Tests\Unit\Models;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_filters_published_news()
    {
        News::factory()->published()->create(['title_en' => 'Published Article']);
        News::factory()->draft()->create(['title_en' => 'Draft Article']);

        $published = News::published()->get();

        $this->assertCount(1, $published);
        $this->assertEquals('Published Article', $published->first()->title_en);
    }

    /** @test */
    public function it_excludes_draft_news_from_published_scope()
    {
        News::factory()->draft()->create(['title_en' => 'Draft One']);
        News::factory()->draft()->create(['title_en' => 'Draft Two']);

        $published = News::published()->get();

        $this->assertCount(0, $published);
    }

    /** @test */
    public function it_excludes_future_published_news()
    {
        News::factory()->create([
            'status' => 'published',
            'published_at' => now()->addDay(),
            'title_en' => 'Future Article',
        ]);

        $published = News::published()->get();

        $this->assertCount(0, $published);
    }

    /** @test */
    public function it_searches_by_khmer_title()
    {
        News::factory()->published()->create([
            'title_km' => 'ការប្រឡងសិស្សពូកែ',
            'title_en' => 'Excellent Student Exam',
        ]);
        News::factory()->published()->create([
            'title_km' => 'ពិធីបុណ្យសាលា',
            'title_en' => 'School Festival',
        ]);

        $results = News::search('ការប្រឡង')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Excellent Student Exam', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_english_title()
    {
        News::factory()->published()->create(['title_en' => 'Science Fair Competition']);
        News::factory()->published()->create(['title_en' => 'Sports Day Event']);

        $results = News::search('Science Fair')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Science Fair Competition', $results->first()->title_en);
    }

    /** @test */
    public function it_searches_by_body_content()
    {
        News::factory()->published()->create([
            'title_en' => 'Annual Event',
            'body_en' => 'Students showcase their robotics projects at the annual tech fair.',
        ]);
        News::factory()->published()->create([
            'title_en' => 'Regular Day',
            'body_en' => 'Normal classroom activities.',
        ]);

        $results = News::search('robotics')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Annual Event', $results->first()->title_en);
    }

    /** @test */
    public function it_returns_empty_for_non_matching_search()
    {
        News::factory()->published()->create(['title_en' => 'School News']);

        $results = News::search('xyznonexistent')->get();

        $this->assertCount(0, $results);
    }

    /** @test */
    public function it_has_author_relationship()
    {
        $author = User::factory()->create(['name' => 'John Doe']);
        $news = News::factory()->published()->create(['author_id' => $author->id]);

        $this->assertInstanceOf(User::class, $news->author);
        $this->assertEquals('John Doe', $news->author->name);
    }

    /** @test */
    public function it_has_category_relationship()
    {
        $news = News::factory()->published()->create();

        $this->assertNull($news->category); // No category set, should be null
    }
}
