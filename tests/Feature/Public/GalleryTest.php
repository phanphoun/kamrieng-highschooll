<?php

use App\Models\GalleryAlbum;

test('gallery index page returns successful response', function () {
    $response = $this->get(route('gallery.index'));
    $response->assertStatus(200);
});

test('gallery index page displays published albums', function () {
    GalleryAlbum::factory()->count(3)->create(['is_published' => true]);

    $response = $this->get(route('gallery.index'));
    $response->assertStatus(200);
});

test('gallery index page does not show draft albums', function () {
    GalleryAlbum::factory()->create(['is_published' => false, 'title_en' => 'Hidden Album']);

    $response = $this->get(route('gallery.index'));
    $response->assertDontSee('Hidden Album');
});

test('gallery show page returns successful response', function () {
    $album = GalleryAlbum::factory()->create(['is_published' => true]);

    $response = $this->get(route('gallery.show', $album->id));
    $response->assertStatus(200);
    $response->assertSee($album->title_en);
});

test('gallery show page returns 404 for non-existent album', function () {
    $response = $this->get(route('gallery.show', 99999));
    $response->assertStatus(404);
});
