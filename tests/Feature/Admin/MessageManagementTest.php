<?php

use App\Models\ContactMessage;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
    $this->actingAs($this->admin);
});

test('admin message index page returns successful response', function () {
    $response = $this->get(route('admin.messages.index'));
    $response->assertStatus(200);
});

test('admin message show page marks message as read', function () {
    $message = ContactMessage::factory()->create(['is_read' => false]);

    $response = $this->get(route('admin.messages.show', $message));
    $response->assertStatus(200);
    expect($message->fresh()->is_read)->toBeTrue();
});

test('admin can reply to message', function () {
    $message = ContactMessage::factory()->create();

    $response = $this->post(route('admin.messages.reply', $message), [
        'reply_message' => 'Thank you for your message.',
    ]);

    $response->assertRedirect(route('admin.messages.show', $message));
    expect($message->fresh()->is_replied)->toBeTrue();
    expect($message->fresh()->reply_message)->toBe('Thank you for your message.');
});

test('admin can delete message', function () {
    $message = ContactMessage::factory()->create();

    $response = $this->delete(route('admin.messages.destroy', $message));
    $response->assertRedirect(route('admin.messages.index'));
    expect(ContactMessage::find($message->id))->toBeNull();
});
