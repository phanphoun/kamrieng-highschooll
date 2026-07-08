<?php

test('home page returns a successful response', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('about page returns a successful response', function () {
    $response = $this->get('/about');
    $response->assertStatus(200);
});

test('contact page returns a successful response', function () {
    $response = $this->get('/contact');
    $response->assertStatus(200);
});
