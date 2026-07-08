<?php

use App\Models\ApplicationStatus;
use App\Models\EnrollmentApplication;

test('enrollment tracking page returns successful response', function () {
    $response = $this->get(route('enrollment.track'));
    $response->assertStatus(200);
});

test('enrollment tracking finds application by valid code', function () {
    $status = ApplicationStatus::factory()->create(['name_en' => 'Pending', 'is_default' => true]);
    $application = EnrollmentApplication::factory()->create([
        'tracking_code' => 'EDU-ABC123',
        'status_id' => $status->id,
    ]);

    $response = $this->get(route('enrollment.track', ['code' => 'EDU-ABC123']));
    $response->assertStatus(200);
    $response->assertSee('EDU-ABC123');
});

test('enrollment tracking shows no result for invalid code', function () {
    $response = $this->get(route('enrollment.track', ['code' => 'INVALID-CODE']));
    $response->assertStatus(200);
});
