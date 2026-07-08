<?php

use App\Models\News;

test('search page returns successful response without query', function () {
    $response = $this->get(route('search'));
    $response->assertStatus(200);
});

test('search returns matching news articles', function () {
    News::factory()->create([
        'title_en' => 'Khmer New Year Celebration',
        'is_published' => true,
        'published_at' => now(),
    ]);
    News::factory()->create([
        'title_en' => 'Mathematics Competition Results',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $response = $this->get(route('search', ['q' => 'New Year']));
    $response->assertStatus(200);
    $response->assertSee('Khmer New Year Celebration');
    $response->assertDontSee('Mathematics Competition Results');
});

test('search with no results shows empty state', function () {
    News::factory()->create([
        'title_en' => 'School News',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $response = $this->get(route('search', ['q' => 'xyznonexistent']));
    $response->assertStatus(200);
});

test('search does not return draft articles', function () {
    News::factory()->create([
        'title_en' => 'Draft Article',
        'is_published' => false,
    ]);

    $response = $this->get(route('search', ['q' => 'Draft']));
    $response->assertDontSee('Draft Article');
});
