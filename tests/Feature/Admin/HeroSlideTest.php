<?php

use App\Models\HeroSlide;
use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
    $this->seed(RolePermissionSeeder::class);
    $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
    ]);
});

function createAdmin(): User
{
    $admin = User::factory()->create();
    $admin->assignRole('admin');
    return $admin;
}

test('guest cannot access hero slides admin index', function () {
    $this->get(route('admin.hero-slides.index'))->assertRedirect(route('login'));
});

test('guest cannot access hero slides admin create', function () {
    $this->get(route('admin.hero-slides.create'))->assertRedirect(route('login'));
});

test('admin can view hero slides list', function () {
    $admin = createAdmin();
    HeroSlide::factory()->count(3)->create();

    $this->actingAs($admin)
        ->get(route('admin.hero-slides.index'))
        ->assertStatus(200);
});

test('admin can create hero slide with image', function () {
    $admin = createAdmin();
    $file = UploadedFile::fake()->create('slide.jpg', 100, 'image/jpeg');

    $this->actingAs($admin)
        ->from(route('admin.hero-slides.create'))
        ->post(route('admin.hero-slides.store'), [
            'title_en' => 'Welcome to Our School',
            'title_kh' => 'សូមស្វាគមន៍មកកាន់សាលារបស់យើង',
            'subtitle_en' => 'Empowering Future Leaders',
            'description_en' => 'A great place to learn and grow.',
            'image' => $file,
            'btn_text_en' => 'Learn More',
            'btn_link' => '/about',
            'sort_order' => 1,
            'is_active' => true,
        ])
        ->assertRedirect(route('admin.hero-slides.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('hero_slides', [
        'title_en' => 'Welcome to Our School',
        'sort_order' => 1,
    ]);

    $slide = HeroSlide::where('title_en', 'Welcome to Our School')->first();
    expect($slide->image_path)->not->toBeNull();
    Storage::disk('public')->assertExists($slide->image_path);
});

test('admin can update hero slide with new image', function () {
    $admin = createAdmin();
    $oldFile = UploadedFile::fake()->create('old.jpg', 100, 'image/jpeg');
    $oldPath = $oldFile->store('hero-slides', 'public');

    $slide = HeroSlide::factory()->create([
        'image_path' => $oldPath,
        'title_en' => 'Original Title',
    ]);

    $newFile = UploadedFile::fake()->create('new.jpg', 100, 'image/jpeg');

    $this->actingAs($admin)
        ->put(route('admin.hero-slides.update', $slide), [
            'title_en' => 'Updated Title',
            'subtitle_en' => 'Updated Subtitle',
            'image' => $newFile,
            'sort_order' => 2,
            'is_active' => true,
        ])
        ->assertRedirect(route('admin.hero-slides.index'))
        ->assertSessionHas('success');

    $slide->refresh();
    expect($slide->title_en)->toBe('Updated Title');
    expect($slide->image_path)->not->toBe($oldPath);

    Storage::disk('public')->assertMissing($oldPath);
    Storage::disk('public')->assertExists($slide->image_path);
});

test('admin can update hero slide without changing image', function () {
    $admin = createAdmin();
    $file = UploadedFile::fake()->create('slide.jpg', 100, 'image/jpeg');
    $path = $file->store('hero-slides', 'public');

    $slide = HeroSlide::factory()->create([
        'image_path' => $path,
        'title_en' => 'Original Title',
    ]);

    $this->actingAs($admin)
        ->put(route('admin.hero-slides.update', $slide), [
            'title_en' => 'Updated Title',
            'subtitle_en' => 'Updated',
            'sort_order' => 2,
            'is_active' => true,
        ])
        ->assertRedirect(route('admin.hero-slides.index'))
        ->assertSessionHas('success');

    $slide->refresh();
    expect($slide->title_en)->toBe('Updated Title');
    Storage::disk('public')->assertExists($path);
});

test('admin can delete hero slide and its image is removed', function () {
    $admin = createAdmin();
    $file = UploadedFile::fake()->create('slide.jpg', 100, 'image/jpeg');
    $path = $file->store('hero-slides', 'public');

    $slide = HeroSlide::factory()->create([
        'image_path' => $path,
    ]);

    $this->actingAs($admin)
        ->delete(route('admin.hero-slides.destroy', $slide))
        ->assertRedirect(route('admin.hero-slides.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseMissing('hero_slides', ['id' => $slide->id]);
    Storage::disk('public')->assertMissing($path);
});

test('create hero slide fails without required fields', function () {
    $admin = createAdmin();

    $this->actingAs($admin)
        ->post(route('admin.hero-slides.store'), [
            'title_en' => '',
        ])
        ->assertInvalid(['title_en', 'image']);
});

test('create hero slide rejects oversized image', function () {
    $admin = createAdmin();
    $file = UploadedFile::fake()->create('large.jpg', 6000, 'image/jpeg');

    $this->actingAs($admin)
        ->post(route('admin.hero-slides.store'), [
            'title_en' => 'Test',
            'image' => $file,
        ])
        ->assertInvalid(['image']);
});
