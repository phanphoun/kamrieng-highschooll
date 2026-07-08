<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProcessImageUpload implements ShouldBeUnique, ShouldQueue
{
    use Queueable;

    public string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function uniqueId(): string
    {
        return $this->path;
    }

    public function handle(): void
    {
        $fullPath = Storage::disk('public')->path($this->path);

        $image = Image::read($fullPath);
        $image->scale(width: 1920);
        $image->save($fullPath);

        $thumbnailDir = dirname($this->path);
        $filename = pathinfo($this->path, PATHINFO_FILENAME);
        $extension = pathinfo($this->path, PATHINFO_EXTENSION);
        $thumbnailPath = "{$thumbnailDir}/{$filename}_thumb.{$extension}";
        $thumbnailFullPath = Storage::disk('public')->path($thumbnailPath);

        $thumbnail = Image::read($fullPath);
        $thumbnail->cover(300, 300);
        $thumbnail->save($thumbnailFullPath);
    }
}
