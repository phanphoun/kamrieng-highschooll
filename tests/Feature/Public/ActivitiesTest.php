<?php

use App\Models\Activity;

test('activities index page returns successful response', function () {
    $response = $this->get(route('activities.index'));
    $response->assertStatus(200);
});

test('activities index page displays published activities', function () {
    Activity::factory()->count(3)->create(['is_published' => true]);

    $response = $this->get(route('activities.index'));
    $response->assertStatus(200);
});

test('activities index page does not show draft activities', function () {
    Activity::factory()->create(['is_published' => false, 'title_en' => 'Draft Activity']);

    $response = $this->get(route('activities.index'));
    $response->assertDontSee('Draft Activity');
});

test('activities show page returns 404 for non-existent activity', function () {
    $response = $this->get(route('activities.show', 'non-existent-slug'));
    $response->assertStatus(404);
});

test('activities show page returns successful response for published activity', function () {
    $activity = Activity::factory()->create(['is_published' => true]);

    $response = $this->get(route('activities.show', $activity->slug));
    $response->assertStatus(200);
    $response->assertSee($activity->title_en);
});
