<?php

use App\Models\SiteSettings;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
    $this->actingAs($this->admin);
});

test('admin settings page returns successful response', function () {
    $response = $this->get(route('admin.settings'));
    $response->assertStatus(200);
});

test('admin can update site settings', function () {
    SiteSettings::factory()->create();

    $response = $this->put(route('admin.settings.update'), [
        'school_name_en' => 'Test School International',
        'school_name_kh' => 'សាលារៀនសាកល្បង',
        'phone' => '0123456789',
        'email' => 'info@testschool.edu',
        'about_description_en' => 'A great school for learning.',
        'academic_year' => '2025-2026',
    ]);

    $response->assertRedirect(route('admin.settings'));
    expect(SiteSettings::first()->school_name_en)->toBe('Test School International');
});

test('admin settings update creates settings if none exist', function () {
    expect(SiteSettings::count())->toBe(0);

    $response = $this->put(route('admin.settings.update'), [
        'school_name_en' => 'New School',
        'phone' => '0987654321',
    ]);

    $response->assertRedirect(route('admin.settings'));
    expect(SiteSettings::count())->toBe(1);
    expect(SiteSettings::first()->school_name_en)->toBe('New School');
});
