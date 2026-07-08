<?php

use App\Models\ContactMessage;

test('contact form can be submitted', function () {
    $response = $this->post('/contact', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'subject' => 'Test Subject',
        'message' => 'This is a test message.',
    ]);

    $response->assertSessionHas('success');
    expect(ContactMessage::count())->toBe(1);
});

test('contact form requires name and email', function () {
    $response = $this->post('/contact', [
        'subject' => 'Test',
        'message' => 'Test',
    ]);

    $response->assertSessionHasErrors(['name', 'email']);
});
