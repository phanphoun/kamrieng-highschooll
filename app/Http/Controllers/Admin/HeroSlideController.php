<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHeroSlideRequest;
use App\Http\Requests\UpdateHeroSlideRequest;
use App\Models\HeroSlide;
use App\Services\FileUploadService;

class HeroSlideController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index()
    {
        $slides = HeroSlide::orderBy('sort_order')->paginate(20);

        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero-slides.create');
    }

    public function store(StoreHeroSlideRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->fileUploadService->upload(
                $request->file('image'),
                'hero-slides',
                'public'
            );
        }

        HeroSlide::create($validated);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero-slides.edit', compact('heroSlide'));
    }

    public function update(UpdateHeroSlideRequest $request, HeroSlide $heroSlide)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image before uploading new one
            if ($heroSlide->image_path) {
                $this->fileUploadService->delete($heroSlide->image_path, 'public');
            }

            $validated['image_path'] = $this->fileUploadService->upload(
                $request->file('image'),
                'hero-slides',
                'public'
            );
        }

        $heroSlide->update($validated);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        // Delete the associated image file
        if ($heroSlide->image_path) {
            $this->fileUploadService->delete($heroSlide->image_path, 'public');
        }

        $heroSlide->delete();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide deleted successfully.');
    }
}
