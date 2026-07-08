<?php

use App\Models\ApplicationStatus;
use App\Models\EnrollmentApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('enrollment application has fillable attributes', function () {
    $application = new EnrollmentApplication;
    expect($application->getFillable())->toContain(
        'tracking_code', 'student_name_en', 'grade_applying_for', 'academic_year', 'status_id'
    );
});

test('enrollment application has correct casts', function () {
    $application = new EnrollmentApplication;
    expect($application->getCasts()['date_of_birth'])->toBe('date');
    expect($application->getCasts()['documents'])->toBe('array');
    expect($application->getCasts()['reviewed_at'])->toBe('datetime');
});

test('enrollment application belongs to status', function () {
    $application = EnrollmentApplication::factory()->create();

    expect($application->status())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\BelongsTo::class);
});

test('enrollment application can track its status', function () {
    $status = ApplicationStatus::factory()->create(['name_en' => 'Pending', 'is_default' => true]);
    $application = EnrollmentApplication::factory()->create(['status_id' => $status->id]);

    expect($application->status->name_en)->toBe('Pending');
});
