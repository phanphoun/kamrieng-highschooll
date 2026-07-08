<?php

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('news has fillable attributes', function () {
    $news = new News;
    expect($news->getFillable())->toContain('title_en', 'title_kh', 'content_en', 'slug');
});

test('news has correct casts', function () {
    $news = new News;
    expect($news->getCasts()['is_published'])->toBe('boolean');
    expect($news->getCasts()['is_featured'])->toBe('boolean');
    expect($news->getCasts()['published_at'])->toBe('datetime');
    expect($news->getCasts()['views_count'])->toBe('integer');
});

test('news published scope returns only published articles', function () {
    News::factory()->create(['is_published' => true, 'published_at' => now()]);
    News::factory()->create(['is_published' => false]);

    expect(News::published()->count())->toBe(1);
});

test('news featured scope returns only featured articles', function () {
    News::factory()->create(['is_featured' => true, 'is_published' => true, 'published_at' => now()]);
    News::factory()->create(['is_featured' => false, 'is_published' => true, 'published_at' => now()]);

    expect(News::featured()->count())->toBe(1);
});

test('news belongs to author', function () {
    $news = News::factory()->create();

    expect($news->author())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\BelongsTo::class);
});
