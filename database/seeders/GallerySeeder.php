<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $album = GalleryAlbum::firstOrCreate(
            ['title_en' => 'Graduation Ceremony 2025'],
            [
                'title_en' => 'Graduation Ceremony 2025',
                'title_kh' => 'ពិធីប្រគល់សញ្ញាបត្រ ២០២៥',
                'description_en' => 'Photos from the graduation ceremony of the class of 2025.',
                'description_kh' => 'រូបថតពីពិធីប្រគល់សញ្ញាបត្រនៃសិស្សានុសិស្សឆ្នាំ ២០២៥',
                'is_published' => true,
            ]
        );

        // Only add images if album was just created (avoid duplicates on re-run)
        if ($album->wasRecentlyCreated) {
            $album->images()->createMany([
                ['image_path' => 'images/gallery/grad1.jpg', 'caption_en' => 'Graduates receiving diplomas', 'sort_order' => 1],
                ['image_path' => 'images/gallery/grad2.jpg', 'caption_en' => 'Class of 2025 group photo', 'sort_order' => 2],
                ['image_path' => 'images/gallery/grad3.jpg', 'caption_en' => 'Valedictorian speech', 'sort_order' => 3],
            ]);
        }
    }
}
