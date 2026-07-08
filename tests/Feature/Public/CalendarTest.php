<?php

use App\Models\Event;

test('calendar page returns successful response', function () {
    $response = $this->get(route('calendar.index'));
    $response->assertStatus(200);
});

test('calendar page displays published events', function () {
    Event::factory()->create([
        'title_en' => 'School Festival',
        'is_published' => true,
    ]);

    $response = $this->get(route('calendar.index'));
    $response->assertStatus(200);
    $response->assertSee('School Festival');
});

test('calendar page does not show draft events', function () {
    Event::factory()->create([
        'title_en' => 'Hidden Event',
        'is_published' => false,
    ]);

    $response = $this->get(route('calendar.index'));
    $response->assertDontSee('Hidden Event');
});
