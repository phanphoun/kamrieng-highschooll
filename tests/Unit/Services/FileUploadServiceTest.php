<?php

use App\Services\FileUploadService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

test('file can be uploaded to storage', function () {
    $service = new FileUploadService;
    $file = UploadedFile::fake()->image('test.jpg');

    $path = $service->upload($file, 'uploads');

    Storage::disk('public')->assertExists($path);
    expect($path)->toMatch('/^uploads\/.+\.jpg$/');
});

test('file can be uploaded to custom directory', function () {
    $service = new FileUploadService;
    $file = UploadedFile::fake()->image('photo.png');

    $path = $service->upload($file, 'gallery');

    Storage::disk('public')->assertExists($path);
    expect($path)->toMatch('/^gallery\/.+\.png$/');
});

test('file can be deleted from storage', function () {
    $service = new FileUploadService;
    $file = UploadedFile::fake()->image('delete-me.jpg');
    $path = $service->upload($file, 'temp');

    $result = $service->delete($path);

    expect($result)->toBeTrue();
    Storage::disk('public')->assertMissing($path);
});

test('deleting non-existent file returns false', function () {
    $service = new FileUploadService;

    $result = $service->delete('non-existent/file.jpg');

    expect($result)->toBeFalse();
});
