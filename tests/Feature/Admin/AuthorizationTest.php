<?php

use App\Models\User;

test('non-admin cannot access admin dashboard', function () {
    $user = User::factory()->create();
    $user->assignRole('viewer');
    $this->actingAs($user);

    $response = $this->get(route('admin.dashboard'));
    $response->assertStatus(403);
});

test('guest cannot access admin dashboard', function () {
    $response = $this->get(route('admin.dashboard'));
    $response->assertRedirect(route('login'));
});
