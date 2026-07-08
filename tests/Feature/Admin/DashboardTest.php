<?php

use App\Models\User;

test('admin dashboard redirects guests to login', function () {
    $response = $this->get(route('admin.dashboard'));
    $response->assertRedirect(route('login'));
});

test('admin dashboard returns successful response for admin', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');
    $this->actingAs($admin);

    $response = $this->get(route('admin.dashboard'));
    $response->assertStatus(200);
});
