<?php

use App\Models\News;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
    $this->actingAs($this->admin);
});

test('admin news index page returns successful response', function () {
    $response = $this->get(route('admin.news.index'));
    $response->assertStatus(200);
});

test('admin news create page returns successful response', function () {
    $response = $this->get(route('admin.news.create'));
    $response->assertStatus(200);
});

test('admin can store news', function () {
    $data = [
        'title_en' => 'Test News Article',
        'content_en' => 'This is the content of the test article.',
        'is_published' => true,
    ];

    $response = $this->post(route('admin.news.store'), $data);
    $response->assertRedirect(route('admin.news.index'));
    $this->assertDatabaseHas('news', ['title_en' => 'Test News Article']);
});

test('admin can update news', function () {
    $article = News::factory()->create();
    $response = $this->put(route('admin.news.update', $article), [
        'title_en' => 'Updated Title',
        'content_en' => 'Updated content.',
    ]);
    $response->assertRedirect(route('admin.news.index'));
    expect($article->fresh()->title_en)->toBe('Updated Title');
});

test('admin can delete news', function () {
    $article = News::factory()->create();
    $response = $this->delete(route('admin.news.destroy', $article));
    $response->assertRedirect(route('admin.news.index'));
    expect(News::find($article->id))->toBeNull();
});
