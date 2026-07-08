<?php

use App\Models\SiteSettings;
use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
});

test('donate page returns a successful response', function () {
    SiteSettings::factory()->create();

    $response = $this->get(route('donate'));
    $response->assertStatus(200);
});

test('donate page shows donation details from settings', function () {
    SiteSettings::factory()->create([
        'donation_bank_name_en' => 'Cambodia Bank PLC',
        'donation_bank_name_kh' => 'ធនាគារកម្ពុជា',
        'donation_account_name_en' => 'EduKhmer High School',
        'donation_account_name_kh' => 'សាលារៀន អេឌុខ្មែរ',
        'donation_account_number' => '1234-5678-9012',
        'donation_instructions_en' => 'Please include your name and contact info.',
        'donation_instructions_kh' => 'សូមបញ្ចូលឈ្មោះនិងព័ត៌មានទំនាក់ទំនងរបស់អ្នក។',
    ]);

    $response = $this->get(route('donate'));
    $response->assertStatus(200);
    $response->assertSee('Cambodia Bank PLC');
    $response->assertSee('EduKhmer High School');
    $response->assertSee('1234-5678-9012');
    $response->assertSee('Please include your name and contact info.');
});

test('donate page shows placeholder when no donation data exists', function () {
    SiteSettings::factory()->create();

    $response = $this->get(route('donate'));
    $response->assertStatus(200);
    $response->assertSee('Donation details will be available soon.');
});

test('admin can update donation settings', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');
    $this->actingAs($admin);

    SiteSettings::factory()->create();

    $response = $this->put(route('admin.settings.update'), [
        'school_name_en' => 'Test School',
        'donation_bank_name_en' => 'Updated Bank',
        'donation_account_name_en' => 'Updated Account',
        'donation_account_number' => '9999-8888',
    ]);
    $response->assertRedirect();
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('site_settings', [
        'donation_bank_name_en' => 'Updated Bank',
        'donation_account_name_en' => 'Updated Account',
        'donation_account_number' => '9999-8888',
    ]);
});

test('public donate page reflects admin setting changes', function () {
    SiteSettings::factory()->create([
        'donation_bank_name_en' => 'Old Bank Name',
    ]);

    $this->get(route('donate'))->assertSee('Old Bank Name');

    $admin = User::factory()->create();
    $admin->assignRole('admin');
    $this->actingAs($admin);

    $this->put(route('admin.settings.update'), [
        'school_name_en' => 'Test School',
        'donation_bank_name_en' => 'New Bank Name',
        'donation_account_name_en' => 'Test Account',
        'donation_account_number' => '0000-1111',
    ]);

    $this->get(route('donate'))->assertSee('New Bank Name');
    $this->get(route('donate'))->assertDontSee('Old Bank Name');
});
