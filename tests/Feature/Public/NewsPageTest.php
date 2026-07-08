<?php

use App\Models\News;
use App\Models\User;

test('news index page returns a successful response', function () {
    $response = $this->get(route('news.index'));
    $response->assertStatus(200);
});

test('news show page returns 404 for non-existent article', function () {
    $response = $this->get(route('news.show', 'non-existent-slug'));
    $response->assertStatus(404);
});

test('news show page returns successful response for published article', function () {
    $article = News::factory()->create(['is_published' => true, 'published_at' => now()]);
    $response = $this->get(route('news.show', $article->slug));
    $response->assertStatus(200);
});
