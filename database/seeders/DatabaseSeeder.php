<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@kamrieng.edu.kh',
        ]);

        // Create a test editor user
        $editor = User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@kamrieng.edu.kh',
        ]);

        // Create news categories
        $categories = [
            ['name_km' => 'សាលារៀន', 'name_en' => 'School', 'slug' => 'school'],
            ['name_km' => 'កីឡា', 'name_en' => 'Sports', 'slug' => 'sports'],
            ['name_km' => 'សិក្សា', 'name_en' => 'Academic', 'slug' => 'academic'],
            ['name_km' => 'ព្រឹត្តិការណ៍', 'name_en' => 'Events', 'slug' => 'events'],
            ['name_km' => 'សហគមន៍', 'name_en' => 'Community', 'slug' => 'community'],
        ];

        foreach ($categories as $cat) {
            NewsCategory::create($cat);
        }

        // Sample news articles with real Unsplash images
        $articles = [
            [
                'category' => 'school',
                'author_id' => $admin->id,
                'title_km' => 'ការបើកឆ្នាំសិក្សាថ្មី ២០២៦-២០២៧',
                'title_en' => 'Opening of the 2026-2027 Academic Year',
                'body_km' => "វិទ្យាល័យកំរៀង មានសេចក្តីរីករាយ សូមប្រកាសឲ្យបានជ្រាបថា ការបើកឆ្នាំសិក្សាថ្មី ២០២៦-២០២៧ នឹងប្រព្រឹត្តទៅនៅថ្ងៃទី ១ ខែ តុលា ឆ្នាំ ២០២៦។\n\nសាលារបស់យើងបានត្រៀមរៀបចំនូវកម្មវិធីសិក្សាថ្មីៗ និងសកម្មភាពក្រៅម៉ោងសិក្សាជាច្រើន ដើម្បីផ្តល់ឱកាសឲ្យសិស្សានុសិស្សទាំងអស់ទទួលបានការអប់រំដែលមានគុណភាពខ្ពស់។\n\nយើងខ្ញុំសូមស្វាគមន៍សិស្សានុសិស្សថ្មីទាំងអស់ និងសូមជូនពរឲ្យឆ្នាំសិក្សាថ្មីនេះប្រព្រឹត្តទៅដោយជោគជ័យ!",
                'body_en' => "Kamrieng High School is pleased to announce that the opening of the 2026-2027 academic year will take place on October 1, 2026.\n\nOur school has prepared new curricula and numerous extracurricular activities to provide all students with a high-quality education.\n\nWe welcome all new students and wish everyone a successful academic year!",
                'cover_image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c7f1?w=800&q=80',
                'is_featured' => true,
                'status' => 'published',
                'published_at' => now()->subDays(3),
            ],
            [
                'category' => 'sports',
                'author_id' => $editor->id,
                'title_km' => 'ក្រុមបាល់ទាត់វិទ្យាល័យកំរៀងឈ្នះពានរង្វាន់ខេត្ត',
                'title_en' => 'Kamrieng High School Football Team Wins Provincial Championship',
                'body_km' => "ក្រុមបាល់ទាត់វិទ្យាល័យកំរៀង ទទួលបានជ័យជម្នះដ៏អស្ចារ្យក្នុងការប្រកួតបាល់ទាត់ថ្នាក់ខេត្ត ដោយយកឈ្នះក្រុមគូប្រជែង ៣-១ នៅក្នុងវគ្គផ្តាច់ព្រ័ត្រ។\n\nកីឡាកររបស់យើងបានបង្ហាញពីជំនាញ និងស្មារតីកីឡាដ៏ខ្ពង់ខ្ពស់ ដែលធ្វើឲ្យសាលារបស់យើងមានមោទនភាពយ៉ាងខ្លាំង។\n\nសូមអបអរសាទរដល់កីឡាករ និងគ្រូបង្វឹកទាំងអស់!",
                'body_en' => "Kamrieng High School's football team achieved a remarkable victory in the provincial football championship, defeating their opponents 3-1 in the final match.\n\nOur players demonstrated exceptional skill and sportsmanship, making our school extremely proud.\n\nCongratulations to all the players and coaches!",
                'cover_image' => 'https://images.unsplash.com/photo-1431324155629-1a6deb1dec8d?w=800&q=80',
                'is_featured' => true,
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'category' => 'academic',
                'author_id' => $admin->id,
                'title_km' => 'លទ្ធផលប្រឡងថ្នាក់ជាតិ ២០២៦',
                'title_en' => 'National Exam Results 2026',
                'body_km' => "វិទ្យាល័យកំរៀង មានសេចក្តីសោមនស្សរីករាយ សូមជម្រាបជូនថា សិស្សានុសិស្សរបស់យើងទទួលបានលទ្ធផលល្អប្រសើរក្នុងការប្រឡងថ្នាក់ជាតិឆ្នាំនេះ។\n\nអត្រាជោគជ័យសរុបគឺ ៩៥% ដែលជាការកើនឡើងគួរឲ្យកត់សម្គាល់បើធៀបនឹងឆ្នាំមុន។ សិស្សរបស់យើងជាច្រើននាក់ទទួលបានពិន្ទុខ្ពស់ក្នុងមុខវិជ្ជាគណិតវិទ្យា វិទ្យាសាស្រ្ត និងភាសាអង់គ្លេស។\n\nសូមអបអរសាទរដល់សិស្សានុសិស្សទាំងអស់ដែលទទួលបានជោគជ័យ!",
                'body_en' => "Kamrieng High School is delighted to announce that our students have achieved excellent results in this year's national examinations.\n\nThe overall success rate is 95%, which is a significant improvement compared to the previous year. Many of our students achieved high scores in Mathematics, Science, and English.\n\nCongratulations to all successful students!",
                'cover_image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&q=80',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(14),
            ],
            [
                'category' => 'events',
                'author_id' => $editor->id,
                'title_km' => 'ពិធីបុណ្យសិល្បៈវប្បធម៌ប្រចាំឆ្នាំ',
                'title_en' => 'Annual Cultural Arts Festival',
                'body_km' => "វិទ្យាល័យកំរៀង នឹងរៀបចំពិធីបុណ្យសិល្បៈវប្បធម៌ប្រចាំឆ្នាំ នៅថ្ងៃទី ១៥ ខែ វិច្ឆិកា ឆ្នាំ ២០២៦។\n\nពិធីបុណ្យនេះ នឹងមានការសម្តែងសិល្បៈវប្បធម៌ខ្មែរ របាំប្រពៃណី តន្ត្រី និងការតាំងពិព័រណ៍សិល្បៈរបស់សិស្សានុសិស្ស។\n\nសូមអញ្ជើញមាតាបិតា អាណាព្យាបាល និងសហគមន៍ទាំងមូលចូលរួមទស្សនាកម្មវិធីដ៏អស្ចារ្យនេះ!",
                'body_en' => "Kamrieng High School will host its Annual Cultural Arts Festival on November 15, 2026.\n\nThe festival will feature Khmer cultural performances, traditional dances, music, and an art exhibition by our students.\n\nParents, guardians, and the entire community are invited to attend this wonderful event!",
                'cover_image' => 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=800&q=80',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(21),
            ],
            [
                'category' => 'community',
                'author_id' => $admin->id,
                'title_km' => 'កម្មវិធីបរិស្ថានស្អាត សាលាស្អាត',
                'title_en' => 'Clean Environment, Clean School Program',
                'body_km' => "សិស្សានុសិស្ស និងលោកគ្រូអ្នកគ្រូ វិទ្យាល័យកំរៀង បានចូលរួមយ៉ាងសកម្មក្នុងកម្មវិធី \"បរិស្ថានស្អាត សាលាស្អាត\" ដោយបានដាំដើមឈើ និងសម្អាតបរិវេណសាលា។\n\nកម្មវិធីនេះ មានគោលបំណងបង្កើនការយល់ដឹងអំពីបរិស្ថាន និងលើកទឹកចិត្តឲ្យសិស្សានុសិស្សចេះថែរក្សាបរិស្ថានជុំវិញខ្លួន។\n\nយើងខ្ញុំសូមថ្លែងអំណរគុណដល់អ្នកចូលរួមទាំងអស់គ្នា!",
                'body_en' => "Students and teachers of Kamrieng High School actively participated in the 'Clean Environment, Clean School' program by planting trees and cleaning the school premises.\n\nThis program aims to raise environmental awareness and encourage students to take care of their surroundings.\n\nWe thank all participants for their contribution!",
                'cover_image' => 'https://images.unsplash.com/photo-1495615080073-6b89c9839ce0?w=800&q=80',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(30),
            ],
            [
                'category' => 'academic',
                'author_id' => $editor->id,
                'title_km' => 'សិក្ខាសាលាស្តីពីបច្ចេកវិទ្យាឌីជីថលក្នុងការអប់រំ',
                'title_en' => 'Workshop on Digital Technology in Education',
                'body_km' => "វិទ្យាល័យកំរៀង បានរៀបចំសិក្ខាសាលាស្តីពី \"បច្ចេកវិទ្យាឌីជីថលក្នុងការអប់រំ\" សម្រាប់លោកគ្រូអ្នកគ្រូ និងសិស្សានុសិស្ស។\n\nសិក្ខាសាលានេះ ផ្តោតលើការប្រើប្រាស់បច្ចេកវិទ្យាទំនើបៗ ដូចជា AI ក្នុងការសិក្សា ការបង្កើតមេរៀនឌីជីថល និងការប្រើប្រាស់ឧបករណ៍អនឡាញសម្រាប់ការរៀនសូត្រ។\n\nយើងខ្ញុំសង្ឃឹមថា សិក្ខាសាលានេះនឹងជួយលើកកម្ពស់គុណភាពនៃការអប់រំនៅក្នុងសាលារបស់យើង។",
                'body_en' => "Kamrieng High School organized a workshop on 'Digital Technology in Education' for teachers and students.\n\nThe workshop focused on using modern technologies such as AI in learning, creating digital lessons, and using online tools for education.\n\nWe hope this workshop will help improve the quality of education in our school.",
                'cover_image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&q=80',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(45),
            ],
            [
                'category' => 'school',
                'author_id' => $admin->id,
                'title_km' => 'ជូនដំណឹងអំពីការចុះឈ្មោះចូលរៀនថ្មី',
                'title_en' => 'Announcement of New Student Enrollment',
                'body_km' => "វិទ្យាល័យកំរៀង សូមប្រកាសឲ្យបានជ្រាបថា ការចុះឈ្មោះចូលរៀនសម្រាប់ឆ្នាំសិក្សា ២០២៦-២០២៧ បានបើកហើយចាប់ពីថ្ងៃនេះតទៅ។\n\nសូមមាតាបិតា អាណាព្យាបាល ដែលមានបំណងចុះឈ្មោះកូនៗរបស់លោកអ្នក សូមទាក់ទងមកការិយាល័យសាលារៀន ដើម្បីទទួលបានព័ត៌មានលម្អិត។\n\nឯកសារចាំបាច់៖ សំបុត្រកំណើត រូបថត ៤x៦ ចំនួន ៤ សន្លឹក និងវិញ្ញាបនបត្រសិក្សា។",
                'body_en' => "Kamrieng High School announces that enrollment for the 2026-2027 academic year is now open.\n\nParents and guardians who wish to enroll their children, please contact the school office for detailed information.\n\nRequired documents: Birth certificate, 4 passport-size photos (4x6), and academic transcripts.",
                'cover_image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c7f1?w=800&q=80',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(60),
            ],
            [
                'category' => 'events',
                'author_id' => $editor->id,
                'title_km' => 'ការប្រកួតប្រជែងវិទ្យាសាស្រ្តប្រចាំឆ្នាំ',
                'title_en' => 'Annual Science Fair Competition',
                'body_km' => "វិទ្យាល័យកំរៀង នឹងរៀបចំការប្រកួតប្រជែងវិទ្យាសាស្រ្តប្រចាំឆ្នាំ នៅថ្ងៃទី ២០ ខែ ធ្នូ ឆ្នាំ ២០២៦។\n\nសិស្សានុសិស្សទាំងអស់ ត្រូវបានលើកទឹកចិត្តឲ្យចូលរួមបង្ហាញនូវគម្រោងវិទ្យាសាស្រ្តរបស់ខ្លួន។ គម្រោងល្អបំផុតនឹងទទួលបានរង្វាន់ និងឱកាសចូលរួមក្នុងការប្រកួតថ្នាក់ជាតិ។\n\nសូមចុះឈ្មោះនៅការិយាល័យសាលារៀន មុនថ្ងៃទី ១ ខែ ធ្នូ។",
                'body_en' => "Kamrieng High School will host its Annual Science Fair Competition on December 20, 2026.\n\nAll students are encouraged to participate and showcase their science projects. The best projects will receive awards and the opportunity to compete at the national level.\n\nPlease register at the school office before December 1st.",
                'cover_image' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=800&q=80',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(90),
            ],
            [
                'category' => 'community',
                'author_id' => $admin->id,
                'title_km' => 'កម្មវិធីសប្បុរសធម៌ជួយកុមារក្រីក្រ',
                'title_en' => 'Charity Program for Underprivileged Children',
                'body_km' => "សិស្សានុសិស្សវិទ្យាល័យកំរៀង បានរៀបចំកម្មវិធីសប្បុរសធម៌ ដើម្បីប្រមូលថវិកា សម្ភារៈសិក្សា និងសម្លៀកបំពាក់ ជូនដល់កុមារក្រីក្រនៅតាមជនបទ។\n\nកម្មវិធីនេះ បានទទួលការគាំទ្រយ៉ាងច្រើនពីសហគមន៍ និងបានប្រមូលថវិកាបានច្រើនជាង ៥,០០០ ដុល្លារ។\n\nសូមអរគុណដល់អ្នកចូលរួមទាំងអស់គ្នាសម្រាប់ការរួមចំណែកដ៏ថ្លៃថ្លានេះ!",
                'body_en' => "Kamrieng High School students organized a charity program to raise funds, school supplies, and clothing for underprivileged children in rural areas.\n\nThe program received overwhelming support from the community and raised over $5,000.\n\nThank you to all participants for this valuable contribution!",
                'cover_image' => 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=800&q=80',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(120),
            ],
        ];

        foreach ($articles as $article) {
            $category = NewsCategory::where('slug', $article['category'])->first();
            
            News::create([
                'category_id' => $category?->id,
                'author_id' => $article['author_id'],
                'title_km' => $article['title_km'],
                'title_en' => $article['title_en'],
                'slug' => Str::slug($article['title_en']),
                'body_km' => $article['body_km'],
                'body_en' => $article['body_en'],
                'cover_image' => $article['cover_image'],
                'is_featured' => $article['is_featured'],
                'status' => $article['status'],
                'published_at' => $article['published_at'],
            ]);
        }
    }
}
