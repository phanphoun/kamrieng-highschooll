<?php

use App\Models\EnrollmentApplication;

test('enrollment apply page returns successful response', function () {
    $response = $this->get(route('enrollment.apply'));
    $response->assertStatus(200);
});

test('enrollment can be submitted', function () {
    $data = [
        'student_name_en' => 'John Doe',
        'date_of_birth' => '2008-01-15',
        'gender' => 'male',
        'phone' => '0123456789',
        'address' => '123 Main St',
        'grade_applying_for' => 'Grade 10',
        'academic_year' => '2025-2026',
        'parent_name' => 'Jane Doe',
        'parent_phone' => '0123456790',
    ];

    $response = $this->post(route('enrollment.store'), $data);
    $response->assertRedirect();
    $this->assertDatabaseHas('enrollment_applications', [
        'student_name_en' => 'John Doe',
    ]);
});

test('enrollment tracking page returns successful response', function () {
    $response = $this->get(route('enrollment.track'));
    $response->assertStatus(200);
});
