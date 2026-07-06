<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\News;
use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteSearchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The search page returns a successful response.
     */
    public function test_search_page_loads(): void
    {
        $response = $this->get(route('search'));

        $response->assertStatus(200);
    }

    /**
     * AC 3: Given a visitor, when they enter an empty query,
     * then they see a prompt to enter a search term.
     */
    public function test_empty_query_shows_prompt(): void
    {
        $response = $this->get(route('search', ['q' => '']));

        $response->assertStatus(200);
        $response->assertSee('សូមបញ្ចូលពាក្យស្វែងរក');
        $response->assertSee('Enter a keyword above');
    }

    /**
     * The search page shows a prompt when no query parameter is provided.
     */
    public function test_no_query_parameter_shows_prompt(): void
    {
        $response = $this->get(route('search'));

        $response->assertStatus(200);
        $response->assertSee('សូមបញ្ចូលពាក្យស្វែងរក');
    }

    /**
     * AC 2: Given a visitor, when they search with no matching results,
     * then they see the full "no results" message in both Khmer and English.
     */
    public function test_no_matching_results_shows_no_results_message(): void
    {
        $response = $this->get(route('search', ['q' => 'xyznonexistent2024']));

        $response->assertStatus(200);

        // Khmer: no results heading
        $response->assertSee('មិនមានលទ្ធផលទេ');
        // Khmer: suggestion to try different keywords
        $response->assertSee('សូមព្យាយាមស្វែងរកជាមួយពាក្យគន្លឹះផ្សេងទៀត');

        // English: no results heading
        $response->assertSee('No results found');
        // English: suggestion to try different keywords
        $response->assertSee('No results found. Try different keywords.');
    }

    /**
     * Searching with a query that matches nothing shows the no-results icon.
     */
    public function test_no_results_shows_search_icon(): void
    {
        $response = $this->get(route('search', ['q' => 'zzzzz_nonexistent_99999']));

        $response->assertStatus(200);
        // The no-results view shows an SVG search icon
        $response->assertSee('svg');
    }

    /**
     * AC 1: Given a visitor on the search page, when they enter a query and submit,
     * then they see matching results from news.
     */
    public function test_search_returns_news_results(): void
    {
        $user = User::factory()->create();
        News::factory()->published()->create([
            'title_en' => 'Science Fair Competition Results',
            'body_en' => 'Students showcased amazing projects at the annual science fair.',
        ]);

        $response = $this->get(route('search', ['q' => 'Science Fair']));

        $response->assertStatus(200);
        $response->assertSee('Science Fair Competition Results');
        $response->assertSee('ព័ត៌មាន');
        $response->assertSee('News');
    }

    /**
     * AC 1: Search returns matching results from pages.
     */
    public function test_search_returns_page_results(): void
    {
        Page::factory()->create([
            'title_en' => 'School History and Mission',
            'body_en' => 'Our school was founded in 2010 with a mission to educate.',
        ]);

        $response = $this->get(route('search', ['q' => 'School History']));

        $response->assertStatus(200);
        $response->assertSee('School History and Mission');
        $response->assertSee('ទំព័រ');
        $response->assertSee('Pages');
    }

    /**
     * AC 1: Search returns matching results from activities/events.
     */
    public function test_search_returns_activity_results(): void
    {
        $user = User::factory()->create();
        Activity::factory()->published()->create([
            'title_en' => 'Annual Sports Day Event',
            'description_en' => 'Students participate in various sports and games.',
        ]);

        $response = $this->get(route('search', ['q' => 'Sports Day']));

        $response->assertStatus(200);
        $response->assertSee('Annual Sports Day Event');
        $response->assertSee('សកម្មភាព');
        $response->assertSee('Activities');
    }

    /**
     * Search with mixed content types returns combined results.
     */
    public function test_search_returns_multiple_content_types(): void
    {
        $user = User::factory()->create();
        News::factory()->published()->create([
            'title_en' => 'Mathematics Olympiad Winners',
            'body_en' => 'Our students won medals at the national level.',
        ]);
        Page::factory()->create([
            'title_en' => 'Mathematics Department',
            'body_en' => 'The mathematics department offers advanced courses.',
        ]);

        $response = $this->get(route('search', ['q' => 'Mathematics']));

        $response->assertStatus(200);
        $response->assertSee('Mathematics Olympiad Winners');
        $response->assertSee('Mathematics Department');
        $response->assertSee('(1)'); // Each section should have 1 result
    }

    /**
     * Search only returns published content.
     */
    public function test_search_only_returns_published_news(): void
    {
        $user = User::factory()->create();
        News::factory()->published()->create([
            'title_en' => 'Published Article',
        ]);
        News::factory()->draft()->create([
            'title_en' => 'Draft Article Not Visible',
        ]);

        $response = $this->get(route('search', ['q' => 'Article']));

        $response->assertStatus(200);
        $response->assertSee('Published Article');
        $response->assertDontSee('Draft Article Not Visible');
    }

    /**
     * Search returns results for Khmer language queries.
     */
    public function test_search_works_with_khmer_query(): void
    {
        $user = User::factory()->create();
        News::factory()->published()->create([
            'title_km' => 'ការប្រឡងសិស្សពូកែ',
            'body_km' => 'សិស្សបានប្រឡងជាប់ដោយជោគជ័យ',
        ]);

        $response = $this->get(route('search', ['q' => 'ការប្រឡង']));

        $response->assertStatus(200);
        $response->assertSee('ការប្រឡងសិស្សពូកែ');
    }

    /**
     * Search results show the total count.
     */
    public function test_search_shows_result_count(): void
    {
        $user = User::factory()->create();
        News::factory()->published()->create([
            'title_en' => 'Unique Search Term ' . uniqid(),
        ]);

        $response = $this->get(route('search', ['q' => 'Unique Search Term']));

        $response->assertStatus(200);
        $response->assertSee('លទ្ធផល');
    }
}
