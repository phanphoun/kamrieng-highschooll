<?php

use App\Models\ApplicationStatus;
use App\Models\EnrollmentApplication;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
    $this->actingAs($this->admin);
});

test('admin enrollment index page returns successful response', function () {
    $response = $this->get(route('admin.enrollments.index'));
    $response->assertStatus(200);
});

test('admin enrollment show page returns successful response', function () {
    $status = ApplicationStatus::factory()->create(['name_en' => 'Pending', 'is_default' => true]);
    $application = EnrollmentApplication::factory()->create(['status_id' => $status->id]);

    $response = $this->get(route('admin.enrollments.show', $application));
    $response->assertStatus(200);
    $response->assertSee($application->student_name_en);
});

test('admin can update enrollment status', function () {
    $statusPending = ApplicationStatus::factory()->create(['name_en' => 'Pending', 'is_default' => true]);
    $statusApproved = ApplicationStatus::factory()->create(['name_en' => 'Approved']);
    $application = EnrollmentApplication::factory()->create(['status_id' => $statusPending->id]);

    $response = $this->put(route('admin.enrollments.status', $application), [
        'status_id' => $statusApproved->id,
        'remarks' => 'Application approved.',
    ]);

    $response->assertRedirect(route('admin.enrollments.show', $application));
    expect($application->fresh()->status_id)->toBe($statusApproved->id);
    expect($application->fresh()->remarks)->toBe('Application approved.');
});

test('admin enrollment status update requires valid status', function () {
    $statusPending = ApplicationStatus::factory()->create(['name_en' => 'Pending', 'is_default' => true]);
    $application = EnrollmentApplication::factory()->create(['status_id' => $statusPending->id]);

    $response = $this->put(route('admin.enrollments.status', $application), [
        'status_id' => 99999,
    ]);

    $response->assertSessionHasErrors('status_id');
});
