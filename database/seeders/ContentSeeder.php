<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\Document;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Leadership;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Notice;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure we have a user to be the author
        $author = User::first() ?? User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@kamrieng.edu.kh',
        ]);

        // ─── Activity Categories ───────────────────────────────────
        $activityCategories = [
            ['name_km' => 'កីឡា', 'name_en' => 'Sports', 'slug' => 'sports'],
            ['name_km' => 'វប្បធម៌', 'name_en' => 'Culture', 'slug' => 'culture'],
            ['name_km' => 'សិក្សា', 'name_en' => 'Academic', 'slug' => 'academic'],
            ['name_km' => 'សហគមន៍', 'name_en' => 'Community', 'slug' => 'community'],
            ['name_km' => 'សិល្បៈ', 'name_en' => 'Arts', 'slug' => 'arts'],
        ];
        foreach ($activityCategories as $cat) {
            ActivityCategory::create($cat);
        }
        $sportsCat = ActivityCategory::where('slug', 'sports')->first();
        $cultureCat = ActivityCategory::where('slug', 'culture')->first();
        $academicCat = ActivityCategory::where('slug', 'academic')->first();
        $communityCat = ActivityCategory::where('slug', 'community')->first();
        $artsCat = ActivityCategory::where('slug', 'arts')->first();

        // ─── News Categories ───────────────────────────────────────
        $newsCategories = [
            ['name_km' => 'ព័ត៌មានទូទៅ', 'name_en' => 'General', 'slug' => 'general'],
            ['name_km' => 'ការអប់រំ', 'name_en' => 'Education', 'slug' => 'education'],
            ['name_km' => 'ព្រឹត្តិការណ៍', 'name_en' => 'Events', 'slug' => 'events'],
            ['name_km' => 'សមិទ្ធផល', 'name_en' => 'Achievements', 'slug' => 'achievements'],
        ];
        foreach ($newsCategories as $cat) {
            NewsCategory::create($cat);
        }
        $generalCat = NewsCategory::where('slug', 'general')->first();
        $educationCat = NewsCategory::where('slug', 'education')->first();
        $eventsCat = NewsCategory::where('slug', 'events')->first();
        $achievementsCat = NewsCategory::where('slug', 'achievements')->first();

        // ─── Activities (27 items) ─────────────────────────────────
        $activities = [
            [
                'category_id' => $sportsCat->id,
                'title_km' => 'ការប្រកួតកីឡាបាល់ទាត់ប្រចាំឆ្នាំ',
                'title_en' => 'Annual Football Tournament',
                'description_km' => 'ការប្រកួតកីឡាបាល់ទាត់ប្រចាំឆ្នាំរបស់វិទ្យាល័យកំរៀង ដោយមានការចូលរួមពីសិស្សានុសិស្សគ្រប់ថ្នាក់។ ការប្រកួតនេះប្រព្រឹត្តទៅរយៈពេល ២ សប្តាហ៍ នៅទីលានកីឡាសាលា។',
                'description_en' => 'The annual football tournament of Kamrieng High School with participation from students of all grades. The tournament runs for 2 weeks at the school sports field.',
                'activity_date' => '2026-06-15',
                'location' => 'ទីលានកីឡាសាលា / School Sports Field',
            ],
            [
                'category_id' => $cultureCat->id,
                'title_km' => 'ពិធីបុណ្យភ្ជុំបិណ្ឌ',
                'title_en' => 'Pchum Ben Festival Celebration',
                'description_km' => 'សិស្សានុសិស្សបានចូលរួមក្នុងពិធីបុណ្យភ្ជុំបិណ្ឌ ដោយមានការរៀបចំកម្មវិធីសាសនា និងការប្រគំតន្ត្រីប្រពៃណីខ្មែរ។',
                'description_en' => 'Students participated in the Pchum Ben festival ceremony with religious programs and traditional Khmer music performances.',
                'activity_date' => '2026-09-20',
                'location' => 'សាលារៀន / School Grounds',
            ],
            [
                'category_id' => $academicCat->id,
                'title_km' => 'ការប្រឡងសិក្សាថ្នាក់ជាតិ',
                'title_en' => 'National Exam Preparation Workshop',
                'description_km' => 'សិក្ខាសាលាត្រៀមប្រឡងសិក្សាថ្នាក់ជាតិ សម្រាប់សិស្សថ្នាក់ទី១២។ គ្រូបង្រៀនបានផ្តល់នូវបច្ចេកទេស និងវិធីសាស្រ្តក្នុងការប្រឡង។',
                'description_en' => 'National exam preparation workshop for 12th grade students. Teachers provided techniques and methods for taking the exams.',
                'activity_date' => '2026-07-10',
                'location' => 'អគារសិក្សា / Academic Building',
            ],
            [
                'category_id' => $communityCat->id,
                'title_km' => 'យុទ្ធនាការសម្អាតបរិស្ថាន',
                'title_en' => 'Environmental Cleanup Campaign',
                'description_km' => 'សិស្សានុសិស្ស និងលោកគ្រូអ្នកគ្រូ បានចូលរួមក្នុងយុទ្ធនាការសម្អាតបរិស្ថាននៅតាមដងផ្លូវ និងសាលារៀន ដើម្បីលើកកម្ពស់អនាម័យបរិស្ថាន។',
                'description_en' => 'Students and teachers participated in an environmental cleanup campaign along the streets and school grounds to promote environmental hygiene.',
                'activity_date' => '2026-05-05',
                'location' => 'ទូទាំងសាលារៀន / Entire School Area',
            ],
            [
                'category_id' => $artsCat->id,
                'title_km' => 'ការតាំងពិព័រណ៍សិល្បៈសិស្ស',
                'title_en' => 'Student Art Exhibition',
                'description_km' => 'ការតាំងពិព័រណ៍ស្នាដៃសិល្បៈរបស់សិស្សានុសិស្ស រួមមាន គំនូរ ចម្លាក់ និងស្នាដៃសិប្បកម្មផ្សេងៗ។',
                'description_en' => 'An exhibition of student artworks including paintings, sculptures, and various handicrafts.',
                'activity_date' => '2026-08-12',
                'location' => 'សាលប្រជុំ / Assembly Hall',
            ],
            [
                'category_id' => $sportsCat->id,
                'title_km' => 'ការប្រកួតកីឡាបាល់ទះ',
                'title_en' => 'Volleyball Competition',
                'description_km' => 'ការប្រកួតកីឡាបាល់ទះរវាងថ្នាក់ផ្សេងៗ ដើម្បីលើកកម្ពស់សុខភាព និងទំនាក់ទំនងរវាងសិស្ស។',
                'description_en' => 'Volleyball competition between different classes to promote health and student relationships.',
                'activity_date' => '2026-10-05',
                'location' => 'ទីលានបាល់ទះ / Volleyball Court',
            ],
            [
                'category_id' => $academicCat->id,
                'title_km' => 'សិក្ខាសាលាស្តីពីវិទ្យាសាស្រ្ត',
                'title_en' => 'Science Workshop',
                'description_km' => 'សិក្ខាសាលាវិទ្យាសាស្រ្តដោយមានការពិសោធន៍គីមីវិទ្យា រូបវិទ្យា និងជីវវិទ្យា ដើម្បីជំរុញចំណាប់អារម្មណ៍របស់សិស្សលើវិទ្យាសាស្រ្ត។',
                'description_en' => 'Science workshop with chemistry, physics, and biology experiments to stimulate student interest in science.',
                'activity_date' => '2026-11-18',
                'location' => 'មន្ទីរពិសោធន៍ / Laboratory',
            ],
            [
                'category_id' => $cultureCat->id,
                'title_km' => 'ការសម្តែងរបាំប្រពៃណីខ្មែរ',
                'title_en' => 'Traditional Khmer Dance Performance',
                'description_km' => 'សិស្សានុសិស្សបានសម្តែងរបាំប្រពៃណីខ្មែរក្នុងពិធីបើកសាលាថ្មី ដោយមានការគាំទ្រពីលោកគ្រូអ្នកគ្រូ និងមាតាបិតា។',
                'description_en' => 'Students performed traditional Khmer dances at the new school opening ceremony, with support from teachers and parents.',
                'activity_date' => '2026-04-22',
                'location' => 'សាលប្រជុំ / Assembly Hall',
            ],
            [
                'category_id' => $communityCat->id,
                'title_km' => 'កម្មវិធីបរិច្ចាគឈាម',
                'title_en' => 'Blood Donation Drive',
                'description_km' => 'កម្មវិធីបរិច្ចាគឈាមសហការជាមួយមន្ទីរពេទ្យបង្អែកស្រុកកំរៀង ដោយមានការចូលរួមពីលោកគ្រូ អ្នកគ្រូ និងសិស្សានុសិស្សជាច្រើននាក់។',
                'description_en' => 'Blood donation drive in collaboration with Kamrieng District Referral Hospital, with participation from many teachers and students.',
                'activity_date' => '2026-03-14',
                'location' => 'សាលារៀន / School Grounds',
            ],
            [
                'category_id' => $artsCat->id,
                'title_km' => 'កម្មវិធីប្រគំតន្ត្រីសិស្ស',
                'title_en' => 'Student Music Concert',
                'description_km' => 'កម្មវិធីប្រគំតន្ត្រីដោយសិស្សានុសិស្ស ដែលមានទាំងតន្ត្រីបុរាណ និងសម័យ ដើម្បីបង្ហាញពីទេពកោសល្យខាងតន្ត្រីរបស់ពួកគេ។',
                'description_en' => 'A music concert by students featuring both traditional and modern music to showcase their musical talents.',
                'activity_date' => '2026-12-20',
                'location' => 'សាលប្រជុំ / Assembly Hall',
            ],
            [
                'category_id' => $academicCat->id,
                'title_km' => 'កម្មវិធីប្រកួតប្រជែងសរសេរអត្ថបទភាសាអង់គ្លេស',
                'title_en' => 'English Essay Writing Competition',
                'description_km' => 'ការប្រកួតប្រជែងសរសេរអត្ថបទភាសាអង់គ្លេសសម្រាប់សិស្សានុសិស្សគ្រប់ថ្នាក់ ដើម្បីលើកកម្ពស់ជំនាញភាសាអង់គ្លេស និងការគិតបែបវិភាគ។',
                'description_en' => 'English essay writing competition for students of all grades to promote English language skills and analytical thinking.',
                'activity_date' => '2026-02-10',
                'location' => 'អគារសិក្សា / Academic Building',
            ],
            [
                'category_id' => $communityCat->id,
                'title_km' => 'កម្មវិធីដាំកូនឈើបរិស្ថាន',
                'title_en' => 'Tree Planting Campaign',
                'description_km' => 'សិស្សានុសិស្ស និងលោកគ្រូអ្នកគ្រូ បានចូលរួមដាំកូនឈើចំនួន ៥០០ ដើមនៅជុំវិញសាលារៀន និងតាមដងផ្លូវក្នុងស្រុកកំរៀង ដើម្បីបង្កើនបរិស្ថានបៃតង។',
                'description_en' => 'Students and teachers planted 500 trees around the school and along roads in Kamrieng district to promote a green environment.',
                'activity_date' => '2026-07-22',
                'location' => 'បរិវេណសាលារៀន / School Premises',
            ],
            [
                'category_id' => $cultureCat->id,
                'title_km' => 'ពិធីបុណ្យចូលឆ្នាំថ្មីខ្មែរ',
                'title_en' => 'Khmer New Year Celebration',
                'description_km' => 'សាលារៀនបានរៀបចំពិធីបុណ្យចូលឆ្នាំថ្មីខ្មែរ ដោយមានការលេងល្បែងប្រពៃណី ការសម្តែងសិល្បៈ និងពិធីបុណ្យបែបប្រពៃណីខ្មែរ។',
                'description_en' => 'The school organized a Khmer New Year celebration with traditional games, art performances, and Khmer cultural ceremonies.',
                'activity_date' => '2026-04-14',
                'location' => 'ទូទាំងសាលារៀន / Entire School Grounds',
            ],
            [
                'category_id' => $sportsCat->id,
                'title_km' => 'ការប្រកួតរត់ប្រណាំងប្រចាំឆ្នាំ',
                'title_en' => 'Annual Athletics Race',
                'description_km' => 'ការប្រកួតរត់ប្រណាំងចម្ងាយ ១០០ម និង ៤០០ម សម្រាប់សិស្សានុសិស្សទាំងអស់។ អ្នកឈ្នះនឹងទទួលបានមេដាយ និងវិញ្ញាបនបត្រកិត្តិយស។',
                'description_en' => '100m and 400m athletics race competitions for all students. Winners will receive medals and certificates of honor.',
                'activity_date' => '2026-11-10',
                'location' => 'ទីលានកីឡាសាលា / School Sports Field',
            ],
            [
                'category_id' => $academicCat->id,
                'title_km' => 'កម្មវិធីប្រឡងប្រជែងគណិតវិទ្យា',
                'title_en' => 'Mathematics Olympiad',
                'description_km' => 'ការប្រឡងប្រជែងគណិតវិទ្យាថ្នាក់សាលារៀន ដើម្បីជ្រើសរើសសិស្សតំណាងចូលរួមការប្រឡងថ្នាក់ស្រុក។ មានសិស្សចូលរួមសរុប ៦០ នាក់។',
                'description_en' => 'School-level Mathematics Olympiad to select students for the district competition. A total of 60 students participated.',
                'activity_date' => '2026-08-25',
                'location' => 'បន្ទប់រៀនលេខ ១០១ / Classroom 101',
            ],
            [
                'category_id' => $cultureCat->id,
                'title_km' => 'កម្មវិធីរៀនសូត្រអំពីប្រពៃណីខ្មែរ',
                'title_en' => 'Khmer Tradition Learning Program',
                'description_km' => 'សិស្សានុសិស្សបានចូលរួមកម្មវិធីរៀនសូត្រអំពីប្រពៃណី និងទំនៀមទម្លាប់ខ្មែរ ដូចជា ការស្លៀកពាក់បែបប្រពៃណី និងការរៀបចំម្ហូបខ្មែរ។',
                'description_en' => 'Students participated in a program learning about Khmer traditions and customs, such as traditional clothing and Khmer cooking.',
                'activity_date' => '2026-01-25',
                'location' => 'សាលប្រជុំ / Assembly Hall',
            ],
            [
                'category_id' => $sportsCat->id,
                'title_km' => 'ការប្រកួតកីឡាបាល់បោះ',
                'title_en' => 'Basketball Competition',
                'description_km' => 'ការប្រកួតកីឡាបាល់បោះរវាងសិស្សថ្នាក់ទី១០ ទី១១ និងទី១២ ដើម្បីលើកកម្ពស់សុខភាព និងស្មារតីកីឡា។',
                'description_en' => 'Basketball competition between grades 10, 11, and 12 students to promote health and sportsmanship.',
                'activity_date' => '2026-02-28',
                'location' => 'ទីលានបាល់បោះ / Basketball Court',
            ],
            [
                'category_id' => $communityCat->id,
                'title_km' => 'កម្មវិធីជួយសង្គមក្នុងស្រុក',
                'title_en' => 'Community Outreach Program',
                'description_km' => 'សិស្សានុសិស្ស និងគ្រូបង្រៀន បានចូលរួមកម្មវិធីជួយសង្គមក្នុងស្រុកកំរៀង ដោយចែកអំណោយដល់គ្រួសារក្រីក្រ។',
                'description_en' => 'Students and teachers participated in a community outreach program in Kamrieng district, distributing gifts to poor families.',
                'activity_date' => '2026-12-05',
                'location' => 'ទូទាំងស្រុកកំរៀង / Kamrieng District',
            ],
            [
                'category_id' => $artsCat->id,
                'title_km' => 'ការប្រកួតប្រជែងច្រៀងសិស្ស',
                'title_en' => 'Student Singing Competition',
                'description_km' => 'ការប្រកួតប្រជែងច្រៀងរវាងសិស្សានុសិស្ស មានទាំងចម្រៀងខ្មែរ និងអន្តរជាតិ ដើម្បីបង្ហាញពីទេពកោសល្យខាងចម្រៀង។',
                'description_en' => 'Singing competition between students featuring both Khmer and international songs to showcase singing talents.',
                'activity_date' => '2026-03-30',
                'location' => 'សាលប្រជុំ / Assembly Hall',
            ],
            [
                'category_id' => $academicCat->id,
                'title_km' => 'កម្មវិធីប្រឡងប្រជែងប្រវត្តិវិទ្យា',
                'title_en' => 'History Quiz Competition',
                'description_km' => 'ការប្រឡងប្រជែងសំណួរប្រវត្តិវិទ្យាខ្មែរ និងពិភពលោក សម្រាប់សិស្សានុសិស្សគ្រប់ថ្នាក់។',
                'description_en' => 'History quiz competition on Khmer and world history for students of all grades.',
                'activity_date' => '2026-09-05',
                'location' => 'អគារសិក្សា / Academic Building',
            ],
            [
                'category_id' => $sportsCat->id,
                'title_km' => 'ការប្រកួតកីឡាហែលទឹកប្រចាំឆ្នាំ',
                'title_en' => 'Annual Swimming Competition',
                'description_km' => 'ការប្រកួតហែលទឹកប្រចាំឆ្នាំរបស់សាលារៀន ដោយមានការចូលរួមពីសិស្សានុសិស្សគ្រប់ថ្នាក់ ក្នុងវិញ្ញាសាហែលសេរី និងហែលបណ្តោយ។',
                'description_en' => 'The annual school swimming competition with participation from students of all grades in freestyle and relay events.',
                'activity_date' => '2026-05-20',
                'location' => 'អាងហែលទឹក / Swimming Pool',
            ],
            [
                'category_id' => $communityCat->id,
                'title_km' => 'កម្មវិធីបណ្តុះបណ្តាលសុវត្ថិភាពចរាចរណ៍',
                'title_en' => 'Traffic Safety Workshop',
                'description_km' => 'សាលារៀនបានសហការជាមួយនគរបាលចរាចរណ៍ស្រុកកំរៀង រៀបចំកម្មវិធីបណ្តុះបណ្តាលសុវត្ថិភាពចរាចរណ៍សម្រាប់សិស្សានុសិស្ស។',
                'description_en' => 'The school collaborated with Kamrieng district traffic police to organize a traffic safety training program for students.',
                'activity_date' => '2026-06-10',
                'location' => 'សាលប្រជុំ / Assembly Hall',
            ],
            [
                'category_id' => $sportsCat->id,
                'title_km' => 'ការប្រកួតកីឡាតេក្វាន់ដូ',
                'title_en' => 'Taekwondo Competition',
                'description_km' => 'ការប្រកួតកីឡាតេក្វាន់ដូរវាងសិស្សានុសិស្សថ្នាក់ទី១០ ដល់ទី១២ ដើម្បីលើកកម្ពស់ជំនាញក្បាច់គុន និងវិន័យ។',
                'description_en' => 'Taekwondo competition between 10th to 12th grade students to promote martial arts skills and discipline.',
                'activity_date' => '2026-04-18',
                'location' => 'ទីលានកីឡាសាលា / School Sports Field',
            ],
            [
                'category_id' => $artsCat->id,
                'title_km' => 'កម្មវិធីគូរគំនូរជញ្ជាំងសាលា',
                'title_en' => 'School Mural Painting Activity',
                'description_km' => 'សិស្សានុសិស្សបានចូលរួមគូរគំនូរជញ្ជាំងសាលារៀន ដើម្បីតុបតែងបរិវេណសាលាឱ្យកាន់តែស្រស់ស្អាត និងមានពណ៌ចម្រុះ។',
                'description_en' => 'Students participated in painting murals on school walls to decorate the school premises and make it more colorful.',
                'activity_date' => '2026-07-08',
                'location' => 'ទូទាំងសាលារៀន / Entire School',
            ],
            [
                'category_id' => $academicCat->id,
                'title_km' => 'កម្មវិធីប្រឡងប្រជែងភាសាអង់គ្លេស',
                'title_en' => 'English Spelling Bee Competition',
                'description_km' => 'ការប្រឡងប្រជែងប្រកបពាក្យភាសាអង់គ្លេសសម្រាប់សិស្សានុសិស្សថ្នាក់ទី៧ ដល់ទី៩ ដើម្បីពង្រឹងជំនាញភាសាអង់គ្លេស។',
                'description_en' => 'English spelling bee competition for 7th to 9th grade students to strengthen English language skills.',
                'activity_date' => '2026-03-05',
                'location' => 'សាលប្រជុំ / Assembly Hall',
            ],
            [
                'category_id' => $communityCat->id,
                'title_km' => 'កម្មវិធីបរិច្ចាគសៀវភៅដល់បណ្ណាល័យ',
                'title_en' => 'Book Donation Program',
                'description_km' => 'សិស្សានុសិស្ស និងលោកគ្រូអ្នកគ្រូ បានបរិច្ចាគសៀវភៅជាង ៣០០ ក្បាលដល់បណ្ណាល័យសាលារៀន ដើម្បីលើកកម្ពស់វប្បធម៌អាន។',
                'description_en' => 'Students and teachers donated over 300 books to the school library to promote reading culture.',
                'activity_date' => '2026-09-12',
                'location' => 'បណ្ណាល័យសាលា / School Library',
            ],
            [
                'category_id' => $cultureCat->id,
                'title_km' => 'កម្មវិធីរាំវង់ប្រពៃណី',
                'title_en' => 'Traditional Circle Dance Night',
                'description_km' => 'ពិធីរាំវង់ប្រពៃណីខ្មែរនៅពេលរាត្រី ដោយមានការចូលរួមពីសិស្សានុសិស្ស និងលោកគ្រូអ្នកគ្រូ ដើម្បីរក្សានូវប្រពៃណីវប្បធម៌ខ្មែរ។',
                'description_en' => 'A traditional Khmer circle dance event at night with participation from students and teachers to preserve Khmer cultural traditions.',
                'activity_date' => '2026-12-28',
                'location' => 'ទីលានកណ្តាលសាលា / School Central Ground',
            ],
        ];

        foreach ($activities as $act) {
            Activity::create(array_merge($act, [
                'author_id' => $author->id,
                'status' => 'published',
            ]));
        }

        // ─── Events (16 items) ───────────────────────────────────────
        $events = [
            [
                'title_km' => 'កម្មវិធីប្រឡងសញ្ញាបត្រមធ្យមសិក្សាទុតិយភូមិ ២០២៦',
                'title_en' => 'Baccalaureate Exam 2026',
                'description_km' => 'ការប្រឡងសញ្ញាបត្រមធ្យមសិក្សាទុតិយភូមិ (បាក់ឌុប) ប្រចាំឆ្នាំ ២០២៦ សម្រាប់សិស្សានុសិស្សថ្នាក់ទី១២។ សូមសិស្សានុសិស្សមកដល់សាលាមុនម៉ោង ៧:០០ ព្រឹក ដោយមានឯកសារចាំបាច់ទាំងអស់។',
                'description_en' => 'The annual Baccalaureate exam 2026 for 12th grade students. Students should arrive at school before 7:00 AM with all necessary documents.',
                'start_date' => '2026-12-20 07:00:00',
                'end_date' => '2026-12-22 17:00:00',
                'location' => 'វិទ្យាល័យកំរៀង / Kamrieng High School',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title_km' => 'ពិធីប្រគល់សញ្ញាបត្រឆ្នាំសិក្សា ២០២៥-២០២៦',
                'title_en' => 'Graduation Ceremony 2025-2026',
                'description_km' => 'ពិធីប្រគល់សញ្ញាបត្រជូនដល់សិស្សានុសិស្សដែលប្រឡងជាប់សញ្ញាបត្រមធ្យមសិក្សាទុតិយភូមិ។ ពិធីនេះនឹងប្រព្រឹត្តទៅក្រោមអធិបតីភាពឯកឧត្តម អភិបាលស្រុកកំរៀង។',
                'description_en' => 'Graduation ceremony for students who passed the Baccalaureate exam. The ceremony will be presided over by the District Governor of Kamrieng.',
                'start_date' => '2027-01-15 08:00:00',
                'end_date' => '2027-01-15 12:00:00',
                'location' => 'សាលប្រជុំវិទ្យាល័យកំរៀង / Kamrieng High School Assembly Hall',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title_km' => 'សន្និសីទមាតាបិតាសិស្សប្រចាំឆ្នាំ',
                'title_en' => 'Annual Parent-Teacher Conference',
                'description_km' => 'សន្និសីទប្រចាំឆ្នាំរវាងមាតាបិតា និងគ្រូបង្រៀន ដើម្បីពិភាក្សាអំពីវឌ្ឍនភាពសិក្សា និងការអភិវឌ្ឍរបស់សិស្សានុសិស្ស។',
                'description_en' => 'Annual conference between parents and teachers to discuss academic progress and student development.',
                'start_date' => '2026-07-20 08:00:00',
                'end_date' => '2026-07-20 16:00:00',
                'location' => 'សាលប្រជុំវិទ្យាល័យកំរៀង / Kamrieng High School Assembly Hall',
                'status' => 'published',
            ],
            [
                'title_km' => 'ការប្រកួតកីឡាបាល់ទាត់ប្រចាំឆ្នាំ',
                'title_en' => 'Annual Football Tournament',
                'description_km' => 'ការប្រកួតកីឡាបាល់ទាត់ប្រចាំឆ្នាំ ដោយមានការចូលរួមពីសិស្សានុសិស្សគ្រប់ថ្នាក់។ ការប្រកួតនឹងប្រព្រឹត្តទៅរយៈពេល ២ សប្តាហ៍។',
                'description_en' => 'Annual football tournament with participation from students of all grades. The tournament will run for 2 weeks.',
                'start_date' => '2026-10-05 08:00:00',
                'end_date' => '2026-10-19 17:00:00',
                'location' => 'ទីលានកីឡាសាលា / School Sports Field',
                'status' => 'published',
            ],
            [
                'title_km' => 'ពិធីបុណ្យចូលឆ្នាំថ្មីខ្មែរ',
                'title_en' => 'Khmer New Year Celebration',
                'description_km' => 'ការប្រារព្ធពិធីបុណ្យចូលឆ្នាំថ្មីខ្មែរ ដោយមានការលេងល្បែងប្រពៃណី ការសម្តែងសិល្បៈវប្បធម៌ និងការរាំវង់ប្រពៃណី។',
                'description_en' => 'Khmer New Year celebration with traditional games, cultural performances, and traditional circle dance.',
                'start_date' => '2027-04-14 08:00:00',
                'end_date' => '2027-04-16 17:00:00',
                'location' => 'ទូទាំងសាលារៀន / Entire School Grounds',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title_km' => 'សិក្ខាសាលាណែនាំអាជីពសម្រាប់សិស្សថ្នាក់ទី១២',
                'title_en' => 'Career Guidance Workshop for Grade 12 Students',
                'description_km' => 'សិក្ខាសាលាណែនាំអាជីពសម្រាប់សិស្សានុសិស្សថ្នាក់ទី១២ ដោយមានវាគ្មិនមកពីសាកលវិទ្យាល័យ និងស្ថាប័នរដ្ឋាភិបាលនានា។',
                'description_en' => 'Career guidance workshop for 12th grade students with speakers from universities and government institutions.',
                'start_date' => '2026-08-20 08:00:00',
                'end_date' => '2026-08-20 12:00:00',
                'location' => 'សាលប្រជុំវិទ្យាល័យកំរៀង / Kamrieng High School Assembly Hall',
                'status' => 'published',
            ],
            [
                'title_km' => 'ទិវាកីឡាសាលារៀន',
                'title_en' => 'School Sports Day',
                'description_km' => 'ទិវាកីឡាសាលារៀនប្រចាំឆ្នាំ ដោយមានកីឡាជាច្រើនប្រភេទដូចជា រត់ប្រណាំង លោតឆ្ងាយ គប់ដុំដែក និងកីឡាប្រជាប្រិយផ្សេងៗទៀត។',
                'description_en' => 'Annual School Sports Day with various sports including running, long jump, shot put, and other popular sports.',
                'start_date' => '2026-11-10 07:00:00',
                'end_date' => '2026-11-10 17:00:00',
                'location' => 'ទីលានកីឡាសាលា / School Sports Field',
                'status' => 'published',
            ],
            [
                'title_km' => 'ការតាំងពិព័រណ៍វិទ្យាសាស្រ្តសិស្ស',
                'title_en' => 'Student Science Fair',
                'description_km' => 'ការតាំងពិព័រណ៍ស្នាដៃវិទ្យាសាស្រ្តរបស់សិស្សានុសិស្ស រួមមាន ការពិសោធន៍គីមីវិទ្យា រូបវិទ្យា ជីវវិទ្យា និងគម្រោងស្រាវជ្រាវផ្សេងៗ។',
                'description_en' => 'Student science fair showcasing projects including chemistry, physics, biology experiments and research projects.',
                'start_date' => '2026-09-08 08:00:00',
                'end_date' => '2026-09-09 16:00:00',
                'location' => 'មន្ទីរពិសោធន៍ និងសាលប្រជុំ / Laboratory & Assembly Hall',
                'status' => 'published',
            ],
            [
                'title_km' => 'សិក្ខាសាលាស្តីពីសុវត្ថិភាពចរាចរណ៍',
                'title_en' => 'Traffic Safety Workshop',
                'description_km' => 'សិក្ខាសាលាស្តីពីសុវត្ថិភាពចរាចរណ៍ ដោយមានកិច្ចសហការជាមួយនគរបាលចរាចរណ៍ស្រុកកំរៀង ដើម្បីអប់រំសិស្សានុសិស្សអំពីច្បាប់ចរាចរណ៍។',
                'description_en' => 'Traffic safety workshop in collaboration with Kamrieng District Traffic Police to educate students about traffic laws.',
                'start_date' => '2026-06-15 08:00:00',
                'end_date' => '2026-06-15 11:00:00',
                'location' => 'សាលប្រជុំវិទ្យាល័យកំរៀង / Kamrieng High School Assembly Hall',
                'status' => 'published',
            ],
            [
                'title_km' => 'កម្មវិធីបរិច្ចាគឈាមប្រចាំឆ្នាំ',
                'title_en' => 'Annual Blood Donation Drive',
                'description_km' => 'កម្មវិធីបរិច្ចាគឈាមប្រចាំឆ្នាំ សហការជាមួយមន្ទីរពេទ្យបង្អែកស្រុកកំរៀង។ សូមលោកគ្រូអ្នកគ្រូ និងសិស្សានុសិស្សចូលរួមបរិច្ចាគឈាមដើម្បីសង្គ្រោះជីវិតមនុស្ស។',
                'description_en' => 'Annual blood donation drive in collaboration with Kamrieng District Referral Hospital. Teachers and students are encouraged to donate blood to save lives.',
                'start_date' => '2026-09-25 08:00:00',
                'end_date' => '2026-09-25 15:00:00',
                'location' => 'អគារសិក្សា / Academic Building',
                'status' => 'published',
            ],
            [
                'title_km' => 'កម្មវិធីដាំកូនឈើបរិស្ថាន',
                'title_en' => 'Tree Planting Campaign',
                'description_km' => 'សិស្សានុសិស្ស និងលោកគ្រូអ្នកគ្រូ ចូលរួមដាំកូនឈើចំនួន ៥០០ ដើមនៅជុំវិញសាលារៀន និងតាមដងផ្លូវក្នុងស្រុកកំរៀង។',
                'description_en' => 'Students and teachers join together to plant 500 trees around the school and along roads in Kamrieng district.',
                'start_date' => '2026-07-22 08:00:00',
                'end_date' => '2026-07-22 12:00:00',
                'location' => 'បរិវេណសាលារៀន / School Premises',
                'status' => 'published',
            ],
            [
                'title_km' => 'ទិវាអានសៀវភៅ',
                'title_en' => 'Book Reading Day',
                'description_km' => 'ទិវាអានសៀវភៅប្រចាំឆ្នាំ ដើម្បីលើកកម្ពស់វប្បធម៌អានក្នុងចំណោមសិស្សានុសិស្ស។ មានការតាំងពិព័រណ៍សៀវភៅ និងការប្រកួតប្រជែងអានសៀវភៅ។',
                'description_en' => 'Annual Book Reading Day to promote reading culture among students. Features a book exhibition and reading competition.',
                'start_date' => '2026-11-25 08:00:00',
                'end_date' => '2026-11-25 16:00:00',
                'location' => 'បណ្ណាល័យសាលា / School Library',
                'status' => 'published',
            ],
            [
                'title_km' => 'ការប្រកួតប្រជែងសុន្ទរកថាអប់រំ',
                'title_en' => 'Educational Speech Competition',
                'description_km' => 'ការប្រកួតប្រជែងសុន្ទរកថាអប់រំសម្រាប់សិស្សានុសិស្សទាំងអស់ ដើម្បីបណ្តុះជំនាញនិយាយជាសាធារណៈ និងទំនុកចិត្តលើខ្លួនឯង។',
                'description_en' => 'Educational speech competition for all students to cultivate public speaking skills and self-confidence.',
                'start_date' => '2026-08-05 08:00:00',
                'end_date' => '2026-08-05 12:00:00',
                'location' => 'សាលប្រជុំវិទ្យាល័យកំរៀង / Kamrieng High School Assembly Hall',
                'status' => 'published',
            ],
            [
                'title_km' => 'ពិធីបុណ្យភ្ជុំបិណ្ឌ',
                'title_en' => 'Pchum Ben Festival',
                'description_km' => 'ការប្រារព្ធពិធីបុណ្យភ្ជុំបិណ្ឌនៅសាលារៀន ដោយមានកម្មវិធីសាសនា ការប្រគំតន្ត្រីប្រពៃណី និងការសម្តែងរបាំប្រពៃណីខ្មែរ។',
                'description_en' => 'Pchum Ben festival celebration at school with religious programs, traditional music performances, and Khmer traditional dance.',
                'start_date' => '2026-09-25 08:00:00',
                'end_date' => '2026-09-29 17:00:00',
                'location' => 'ទូទាំងសាលារៀន / Entire School Grounds',
                'status' => 'published',
            ],
            [
                'title_km' => 'កម្មវិធីបណ្តុះបណ្តាលគ្រូបង្រៀនថ្មី',
                'title_en' => 'New Teacher Training Program',
                'description_km' => 'កម្មវិធីបណ្តុះបណ្តាលគ្រូបង្រៀនថ្មី ដើម្បីលើកកម្ពស់សមត្ថភាពបង្រៀន និងធានាគុណភាពអប់រំ។ មានការចូលរួមពីគ្រូបង្រៀនថ្មីចំនួន ១០ នាក់។',
                'description_en' => 'New teacher training program to enhance teaching skills and ensure education quality. 10 new teachers will participate.',
                'start_date' => '2026-10-01 08:00:00',
                'end_date' => '2026-10-05 17:00:00',
                'location' => 'បន្ទប់ប្រជុំគ្រូបង្រៀន / Teachers Meeting Room',
                'status' => 'published',
            ],
            [
                'title_km' => 'ទិវាបរិស្ថានសាលារៀន',
                'title_en' => 'School Environment Day',
                'description_km' => 'ទិវាបរិស្ថានសាលារៀន ដោយមានសកម្មភាពសម្អាតបរិវេណសាលា ការប្រកួតប្រជែងតុបតែងថ្នាក់រៀន និងការផ្តល់ចំណេះដឹងអំពីការគ្រប់គ្រងកាកសំណល់។',
                'description_en' => 'School Environment Day with activities including campus cleanup, classroom decoration competition, and waste management education.',
                'start_date' => '2026-06-05 08:00:00',
                'end_date' => '2026-06-05 16:00:00',
                'location' => 'ទូទាំងសាលារៀន / Entire School',
                'status' => 'published',
            ],
        ];

        foreach ($events as $event) {
            Event::create(array_merge($event, [
                'author_id' => $author->id,
            ]));
        }

        // ─── News (18 items) ───────────────────────────────────────
        $newsItems = [
            [
                'category_id' => $generalCat->id,
                'title_km' => 'វិទ្យាល័យកំរៀងបើកដំណើរការអគារសិក្សាថ្មី',
                'title_en' => 'Kamrieng High School Opens New Academic Building',
                'slug' => 'new-academic-building',
                'body_km' => 'វិទ្យាល័យកំរៀង បានបើកដំណើរការអគារសិក្សាថ្មីមួយដែលមានបន្ទប់រៀនចំនួន ២០ បន្ទប់ បន្ទប់ពិសោធន៍ចំនួន ៣ និងបណ្ណាល័យទំនើបមួយ។ អគារថ្មីនេះនឹងជួយលើកកម្ពស់គុណភាពនៃការអប់រំនៅក្នុងស្រុកកំរៀង។',
                'body_en' => 'Kamrieng High School has inaugurated a new academic building with 20 classrooms, 3 laboratories, and a modern library. This new building will help improve the quality of education in Kamrieng district.',
                'status' => 'published',
                'published_at' => '2026-01-15 08:00:00',
            ],
            [
                'category_id' => $educationCat->id,
                'title_km' => 'លទ្ធផលប្រឡងថ្នាក់ទី១២ ឆ្នាំសិក្សា ២០២៥-២០២៦',
                'title_en' => 'Grade 12 Exam Results for Academic Year 2025-2026',
                'slug' => 'grade12-exam-results-2026',
                'body_km' => 'សិស្សានុសិស្សថ្នាក់ទី១២ នៃវិទ្យាល័យកំរៀង សម្រេចបានលទ្ធផលប្រឡងសញ្ញាបត្រមធ្យមសិក្សាទុតិយភូមិ (បាក់ឌុប) ដ៏ល្អប្រសើរ ដោយមានសិស្សជាង ៩០% ប្រឡងជាប់។ ក្នុងនោះមានសិស្សចំនួន ២០ នាក់ទទួលបានពិន្ទុលេខ A។',
                'body_en' => 'Grade 12 students of Kamrieng High School achieved excellent results in the Baccalaureate exam, with over 90% passing rate. Among them, 20 students received grade A.',
                'status' => 'published',
                'published_at' => '2026-06-30 09:00:00',
            ],
            [
                'category_id' => $eventsCat->id,
                'title_km' => 'សន្និសីទមាតាបិតាសិស្ស ប្រចាំឆ្នាំ',
                'title_en' => 'Annual Parent-Teacher Conference',
                'slug' => 'parent-teacher-conference-2026',
                'body_km' => 'សាលារៀននឹងរៀបចំសន្និសីទមាតាបិតាសិស្សប្រចាំឆ្នាំ នៅថ្ងៃទី ២០ ខែកក្កដា ឆ្នាំ ២០២៦។ សូមអញ្ជើញមាតាបិតាទាំងអស់ចូលរួមដើម្បីពិភាក្សាអំពីវឌ្ឍនភាពសិក្សារបស់កូនៗ។',
                'body_en' => 'The school will hold its annual Parent-Teacher Conference on July 20, 2026. All parents are invited to attend to discuss their children\'s academic progress.',
                'status' => 'published',
                'published_at' => '2026-07-01 10:00:00',
            ],
            [
                'category_id' => $achievementsCat->id ?? $educationCat->id,
                'title_km' => 'វិទ្យាល័យកំរៀងទទួលបានពានរង្វាន់សាលារៀនគំរូ',
                'title_en' => 'Kamrieng High School Awarded Model School',
                'slug' => 'model-school-award',
                'body_km' => 'វិទ្យាល័យកំរៀង ត្រូវបានទទួលស្គាល់ជាសាលារៀនគំរូ ដោយក្រសួងអប់រំ យុវជន និងកីឡា សម្រាប់សមិទ្ធផលឆ្នើមក្នុងការអប់រំ និងការគ្រប់គ្រងសាលារៀន។',
                'body_en' => 'Kamrieng High School has been recognized as a Model School by the Ministry of Education, Youth and Sport for outstanding achievements in education and school management.',
                'status' => 'published',
                'published_at' => '2026-03-10 08:30:00',
            ],
            [
                'category_id' => $educationCat->id,
                'title_km' => 'ការចុះឈ្មោះចូលរៀនឆ្នាំសិក្សាថ្មី ២០២៦-២០២៧',
                'title_en' => 'Enrollment for Academic Year 2026-2027',
                'slug' => 'enrollment-2026-2027',
                'body_km' => 'វិទ្យាល័យកំរៀង បានបើកការចុះឈ្មោះចូលរៀនសម្រាប់ឆ្នាំសិក្សា ២០២៦-២០២៧ ចាប់ពីថ្ងៃទី ១ ខែតុលា ឆ្នាំ ២០២៦។ សូមអញ្ជើញមកចុះឈ្មោះនៅការិយាល័យសាលា។',
                'body_en' => 'Kamrieng High School has opened enrollment for the 2026-2027 academic year starting October 1, 2026. Please come to register at the school office.',
                'status' => 'published',
                'published_at' => '2026-09-15 08:00:00',
            ],
            [
                'category_id' => $eventsCat->id,
                'title_km' => 'កម្មវិធីប្រកួតប្រជែងថ្នាក់ស្រុក',
                'title_en' => 'District-Level Competition Event',
                'slug' => 'district-competition-2026',
                'body_km' => 'សិស្សានុសិស្សវិទ្យាល័យកំរៀង បានចូលរួមក្នុងកម្មវិធីប្រកួតប្រជែងថ្នាក់ស្រុក ទាំងផ្នែកសិក្សា និងកីឡា និងទទួលបានជោគជ័យយ៉ាងធំធេង។',
                'body_en' => 'Kamrieng High School students participated in the district-level competition in both academic and sports categories and achieved great success.',
                'status' => 'published',
                'published_at' => '2026-02-20 09:00:00',
            ],
            [
                'category_id' => $generalCat->id,
                'title_km' => 'ដំណឹងអំពីការប្រកាសឈប់សម្រាកបុណ្យភ្ជុំបិណ្ឌ',
                'title_en' => 'Announcement of Pchum Ben Holiday',
                'slug' => 'pchum-ben-holiday-2026',
                'body_km' => 'សាលារៀននឹងឈប់សម្រាកបុណ្យភ្ជុំបិណ្ឌ ចាប់ពីថ្ងៃទី ២៥ ខែកញ្ញា ដល់ថ្ងៃទី ២៩ ខែកញ្ញា ឆ្នាំ ២០២៦។ សូមសិស្សានុសិស្សទាំងអស់គោរពតាមកាលវិភាគឈប់សម្រាក។',
                'body_en' => 'The school will be closed for Pchum Ben holiday from September 25 to September 29, 2026. All students are requested to follow the holiday schedule.',
                'status' => 'published',
                'published_at' => '2026-09-10 08:00:00',
            ],
            [
                'category_id' => $educationCat->id,
                'title_km' => 'កម្មវិធីសិក្សាបន្ថែមផ្នែកភាសាអង់គ្លេស',
                'title_en' => 'English Language Enrichment Program',
                'slug' => 'english-enrichment-program',
                'body_km' => 'វិទ្យាល័យកំរៀង សូមប្រកាសដាក់ឱ្យដំណើរការកម្មវិធីសិក្សាបន្ថែមផ្នែកភាសាអង់គ្លេស សម្រាប់សិស្សានុសិស្សគ្រប់ថ្នាក់ ដោយមានលោកគ្រូជំនាញមកពីក្រៅប្រទេស។',
                'body_en' => 'Kamrieng High School announces the launch of an English Language Enrichment Program for students of all grades, with expert teachers from abroad.',
                'status' => 'published',
                'published_at' => '2026-08-01 08:00:00',
            ],
            [
                'category_id' => $eventsCat->id,
                'title_km' => 'សិក្ខាសាលាស្តីពីការប្រើប្រាស់បច្ចេកវិទ្យាក្នុងការសិក្សា',
                'title_en' => 'Workshop on Using Technology in Learning',
                'slug' => 'technology-in-learning-workshop',
                'body_km' => 'វិទ្យាល័យកំរៀង បានរៀបចំសិក្ខាសាលាស្តីពីការប្រើប្រាស់បច្ចេកវិទ្យាទំនើបក្នុងការសិក្សារៀនសូត្រ ដោយមានការចូលរួមពីសិស្សានុសិស្សជាង ១០០ នាក់។',
                'body_en' => 'Kamrieng High School organized a workshop on using modern technology in learning, with participation from over 100 students.',
                'status' => 'published',
                'published_at' => '2026-04-05 09:00:00',
            ],
            [
                'category_id' => $generalCat->id,
                'title_km' => 'ការប្រកាសជ្រើសរើសសិស្សពូកែឆ្នាំ ២០២៦',
                'title_en' => 'Announcement of Outstanding Student Selection 2026',
                'slug' => 'outstanding-student-2026',
                'body_km' => 'វិទ្យាល័យកំរៀង សូមប្រកាសជ្រើសរើសសិស្សពូកែប្រចាំឆ្នាំ ២០២៦។ សិស្សានុសិស្សដែលមានចំណាត់ថ្នាក់ល្អអាចដាក់ពាក្យបានចាប់ពីថ្ងៃទី ១ ខែឧសភា។',
                'body_en' => 'Kamrieng High School announces the selection of outstanding students for 2026. Students with good grades can apply from May 1st.',
                'status' => 'published',
                'published_at' => '2026-04-20 08:00:00',
            ],
            [
                'category_id' => $educationCat->id,
                'title_km' => 'កម្មវិធីបណ្តុះបណ្តាលគ្រូបង្រៀនថ្មី',
                'title_en' => 'New Teacher Training Program',
                'slug' => 'new-teacher-training-2026',
                'body_km' => 'វិទ្យាល័យកំរៀង បានរៀបចំកម្មវិធីបណ្តុះបណ្តាលគ្រូបង្រៀនថ្មីចំនួន ១០ នាក់ ដើម្បីលើកកម្ពស់សមត្ថភាពបង្រៀន និងធានាគុណភាពអប់រំ។',
                'body_en' => 'Kamrieng High School organized a training program for 10 new teachers to enhance teaching skills and ensure education quality.',
                'status' => 'published',
                'published_at' => '2026-10-01 08:30:00',
            ],
            [
                'category_id' => $eventsCat->id,
                'title_km' => 'កម្មវិធីប្រកួតប្រជែងសុភាសិតខ្មែរ',
                'title_en' => 'Khmer Proverb Competition',
                'slug' => 'khmer-proverb-competition',
                'body_km' => 'សាលារៀនបានរៀបចំកម្មវិធីប្រកួតប្រជែងសុភាសិតខ្មែរ ដើម្បីលើកកម្ពស់ការយល់ដឹងអំពីវប្បធម៌ និងភាសាខ្មែររបស់សិស្សានុសិស្ស។',
                'body_en' => 'The school organized a Khmer proverb competition to promote students\' understanding of Khmer culture and language.',
                'status' => 'published',
                'published_at' => '2026-05-10 10:00:00',
            ],
            [
                'category_id' => $educationCat->id,
                'title_km' => 'ការប្រកាសពីការបើកវគ្គសិក្សាកុំព្យូទ័រ',
                'title_en' => 'Computer Course Enrollment Announcement',
                'slug' => 'computer-course-announcement',
                'body_km' => 'វិទ្យាល័យកំរៀង សូមប្រកាសបើកវគ្គសិក្សាកុំព្យូទ័រសម្រាប់សិស្សានុសិស្សគ្រប់ថ្នាក់ ចាប់ពីថ្ងៃទី ១ ខែវិច្ឆិកា។ ចំនួនសិស្សមានកំណត់ត្រឹម ៣០ នាក់ប៉ុណ្ណោះ។',
                'body_en' => 'Kamrieng High School announces computer courses for all grades starting November 1. Limited to 30 students only.',
                'status' => 'published',
                'published_at' => '2026-10-15 08:00:00',
            ],
            [
                'category_id' => $generalCat->id,
                'title_km' => 'ការបើកវគ្គសិក្សាចំណេះទូទៅ',
                'title_en' => 'General Knowledge Course Launch',
                'slug' => 'general-knowledge-course-2026',
                'body_km' => 'វិទ្យាល័យកំរៀង បើកវគ្គសិក្សាចំណេះទូទៅបន្ថែមសម្រាប់សិស្សានុសិស្សថ្នាក់ទី១២ ដែលចង់ពង្រឹងចំណេះដឹងមុនប្រឡងបាក់ឌុប។',
                'body_en' => 'Kamrieng High School launches additional general knowledge courses for 12th grade students who want to strengthen their knowledge before the Baccalaureate exam.',
                'status' => 'published',
                'published_at' => '2026-11-01 08:00:00',
            ],
            [
                'category_id' => $eventsCat->id,
                'title_km' => 'ការប្រកួតប្រជែងសុំសារអប់រំ',
                'title_en' => 'Educational Speech Competition',
                'slug' => 'educational-speech-competition',
                'body_km' => 'សាលារៀនបានរៀបចំការប្រកួតប្រជែងសុន្ទរកថាអប់រំសម្រាប់សិស្សានុសិស្សទាំងអស់ ដើម្បីបណ្តុះជំនាញនិយាយជាសាធារណៈ។',
                'body_en' => 'The school organized an educational speech competition for all students to cultivate public speaking skills.',
                'status' => 'published',
                'published_at' => '2026-07-20 09:00:00',
            ],
            [
                'category_id' => $educationCat->id,
                'title_km' => 'កម្មវិធីប្រឡងជ្រើសរើសសិស្សពូកែគណិតវិទ្យា',
                'title_en' => 'Mathematics Talent Selection Exam',
                'slug' => 'math-talent-selection-2026',
                'body_km' => 'វិទ្យាល័យកំរៀង ប្រកាសជ្រើសរើសសិស្សពូកែគណិតវិទ្យា សម្រាប់ចូលរួមកម្មវិធីថ្នាក់ជាតិ។ សិស្សដែលមានចំណាប់អារម្មណ៍ត្រូវដាក់ពាក្យត្រឹមថ្ងៃទី ៣០ ខែមិថុនា។',
                'body_en' => 'Kamrieng High School announces the selection of math-talented students for the national program. Interested students must apply by June 30.',
                'status' => 'published',
                'published_at' => '2026-06-01 08:30:00',
            ],
            [
                'category_id' => $generalCat->id,
                'title_km' => 'ការប្រារព្ធទិវាកុមារអន្តរជាតិ',
                'title_en' => 'International Children Day Celebration',
                'slug' => 'children-day-2026',
                'body_km' => 'វិទ្យាល័យកំរៀង បានរៀបចំកម្មវិធីប្រារព្ធទិវាកុមារអន្តរជាតិ ១ មិថុនា ដោយមានការចូលរួមពីសិស្សានុសិស្សទាំងអស់ និងការចែកអំណោយដល់កុមារ។',
                'body_en' => 'Kamrieng High School organized an International Children Day celebration on June 1 with participation from all students and gift distribution to children.',
                'status' => 'published',
                'published_at' => '2026-05-25 08:00:00',
            ],
            [
                'category_id' => $eventsCat->id,
                'title_km' => 'សិក្ខាសាលាស្តីពីការជ្រើសរើសអាជីព',
                'title_en' => 'Career Guidance Workshop',
                'slug' => 'career-guidance-workshop-2026',
                'body_km' => 'សាលារៀនបានរៀបចំសិក្ខាសាលាណែនាំអាជីពសម្រាប់សិស្សានុសិស្សថ្នាក់ទី១២ ដោយមានវាគ្មិនមកពីសាកលវិទ្យាល័យនានា។',
                'body_en' => 'The school organized a career guidance workshop for 12th grade students with speakers from various universities.',
                'status' => 'published',
                'published_at' => '2026-08-20 09:00:00',
            ],
        ];

        foreach ($newsItems as $news) {
            News::create(array_merge($news, [
                'author_id' => $author->id,
            ]));
        }

        // ─── Pages (13 items) ─────────────────────────────────────
        $pages = [
            [
                'key' => 'about',
                'title_km' => 'អំពីសាលារៀន',
                'title_en' => 'About Our School',
                'body_km' => 'វិទ្យាល័យកំរៀង ជាសាលារៀនសាធារណៈដ៏ឈានមុខគេក្នុងស្រុកកំរៀង ខេត្តបាត់ដំបង។ សាលារៀនត្រូវបានបង្កើតឡើងក្នុងគោលបំណងផ្តល់ការអប់រំប្រកបដោយគុណភាពដល់យុវជនក្នុងតំបន់។ បច្ចុប្បន្ននេះ សាលារៀនមានសិស្សសរុបជាង ៨០០ នាក់ និងគ្រូបង្រៀនជាង ៥០ នាក់។',
                'body_en' => 'Kamrieng High School is a leading public school in Kamrieng district, Battambang province. The school was established with the mission of providing quality education to youth in the region. Currently, the school has over 800 students and more than 50 teachers.',
            ],
            [
                'key' => 'admissions',
                'title_km' => 'ការចុះឈ្មោះចូលរៀន',
                'title_en' => 'Admissions',
                'body_km' => 'ការចុះឈ្មោះចូលរៀននៅវិទ្យាល័យកំរៀង បើកសម្រាប់សិស្សគ្រប់រូបដែលមានអាយុសមស្រប និងមានបំណងចង់សិក្សា។ ឯកសារចាំបាច់សម្រាប់ការចុះឈ្មោះរួមមាន៖ សំបុត្រកំណើត វិញ្ញាបនបត្រសិក្សា រូបថត ៤x៦ ចំនួន ៤ សន្លឹក។',
                'body_en' => 'Enrollment at Kamrieng High School is open to all eligible students who wish to study. Required documents include: birth certificate, academic transcripts, and 4 passport-size photos (4x6).',
            ],
            [
                'key' => 'facilities',
                'title_km' => 'បរិក្ខារសាលារៀន',
                'title_en' => 'School Facilities',
                'body_km' => 'វិទ្យាល័យកំរៀង មានបរិក្ខារទំនើបៗជាច្រើន រួមមាន៖ បន្ទប់រៀនបំពាក់ម៉ាស៊ីនត្រជាក់ មន្ទីរពិសោធន៍វិទ្យាសាស្រ្ត បណ្ណាល័យ ទីលានកីឡា និងបន្ទប់កុំព្យូទ័រ។',
                'body_en' => 'Kamrieng High School has many modern facilities including: air-conditioned classrooms, science laboratories, a library, sports fields, and a computer lab.',
            ],
            [
                'key' => 'history',
                'title_km' => 'ប្រវត្តិសាលារៀន',
                'title_en' => 'School History',
                'body_km' => 'វិទ្យាល័យកំរៀង ត្រូវបានបង្កើតឡើងក្នុងឆ្នាំ ២០០០ ដោយមានសិស្សតែ ៥០ នាក់ និងគ្រូ ៥ នាក់ប៉ុណ្ណោះ។ សព្វថ្ងៃនេះ សាលារៀនបានអភិវឌ្ឍក្លាយជាសាលារៀនដ៏ធំមួយ មានសិស្សជាង ៨០០ នាក់។',
                'body_en' => 'Kamrieng High School was established in 2000 with only 50 students and 5 teachers. Today, the school has grown into a large institution with over 800 students.',
            ],
            [
                'key' => 'vision',
                'title_km' => 'ចក្ខុវិស័យ និងបេសកកម្ម',
                'title_en' => 'Vision and Mission',
                'body_km' => 'ចក្ខុវិស័យរបស់វិទ្យាល័យកំរៀង គឺដើម្បីក្លាយជាសាលារៀនឈានមុខគេក្នុងខេត្តបាត់ដំបង។ បេសកកម្មរបស់យើងគឺផ្តល់ការអប់រំប្រកបដោយគុណភាព និងបណ្តុះបណ្តាលយុវជនឱ្យក្លាយជាពលរដ្ឋល្អ។',
                'body_en' => 'Our vision is to become a leading school in Battambang province. Our mission is to provide quality education and train youth to become good citizens.',
            ],
            [
                'key' => 'staff',
                'title_km' => 'បុគ្គលិក',
                'title_en' => 'Our Staff',
                'body_km' => 'វិទ្យាល័យកំរៀង មានបុគ្គលិកសរុប ៦៥ នាក់ ក្នុងនោះរួមមាន គ្រូបង្រៀន ៥០ នាក់ បុគ្គលិករដ្ឋបាល ១០ នាក់ និងបុគ្គលិកថែទាំ ៥ នាក់។',
                'body_en' => 'Kamrieng High School has a total of 65 staff members, including 50 teachers, 10 administrative staff, and 5 maintenance staff.',
            ],
            [
                'key' => 'clubs',
                'title_km' => 'ក្លឹបសិស្ស',
                'title_en' => 'Student Clubs',
                'body_km' => 'សាលារៀនមានក្លឹបសិស្សជាច្រើនដូចជា៖ ក្លឹបភាសាអង់គ្លេស ក្លឹបវិទ្យាសាស្រ្ត ក្លឹបកីឡា ក្លឹបសិល្បៈ និងក្លឹបបរិស្ថាន។ សិស្សានុសិស្សអាចចូលរួមតាមចំណាប់អារម្មណ៍របស់ពួកគេ។',
                'body_en' => 'The school has many student clubs such as: English Club, Science Club, Sports Club, Arts Club, and Environment Club. Students can join according to their interests.',
            ],
            [
                'key' => 'achievements-page',
                'title_km' => 'សមិទ្ធផលរបស់សាលា',
                'title_en' => 'School Achievements',
                'body_km' => 'វិទ្យាល័យកំរៀង សម្រេចបានសមិទ្ធផលជាច្រើនរួមមាន៖ ពានរង្វាន់សាលារៀនគំរូ ពានរង្វាន់សាលារៀនបៃតង និងពានរង្វាន់ជើងឯកកីឡាថ្នាក់ស្រុក។',
                'body_en' => 'Kamrieng High School has achieved many accomplishments including: Model School Award, Green School Award, and District Sports Champion title.',
            ],
            [
                'key' => 'academic-program',
                'title_km' => 'កម្មវិធីសិក្សា',
                'title_en' => 'Academic Programs',
                'body_km' => 'វិទ្យាល័យកំរៀង ផ្តល់ជូននូវកម្មវិធីសិក្សាចម្រុះ រួមមាន៖ វិទ្យាសាស្រ្ត គណិតវិទ្យា ភាសាបរទេស និងវិទ្យាសាស្រ្តសង្គម ស្របតាមកម្មវិធីសិក្សារបស់ក្រសួងអប់រំ។',
                'body_en' => 'Kamrieng High School offers diverse academic programs including: Sciences, Mathematics, Foreign Languages, and Social Sciences, aligned with the Ministry of Education curriculum.',
            ],
            [
                'key' => 'sports-program',
                'title_km' => 'កម្មវិធីកីឡា',
                'title_en' => 'Sports Programs',
                'body_km' => 'សាលារៀនមានកម្មវិធីកីឡាចម្រុះរួមមាន៖ បាល់ទាត់ បាល់ទះ បាល់បោះ តេក្វាន់ដូ និងអត្តពលកម្ម។ សិស្សានុសិស្សអាចជ្រើសរើសតាមចំណាប់អារម្មណ៍។',
                'body_en' => 'The school offers diverse sports programs including: Football, Volleyball, Basketball, Taekwondo, and Athletics. Students can choose according to their interests.',
            ],
            [
                'key' => 'library',
                'title_km' => 'បណ្ណាល័យ',
                'title_en' => 'Library',
                'body_km' => 'បណ្ណាល័យវិទ្យាល័យកំរៀង មានសៀវភៅជាង ៥០០០ ក្បាល ទាំងភាសាខ្មែរ និងអង់គ្លេស ព្រមទាំងបន្ទប់អានដែលមានម៉ាស៊ីនត្រជាក់ និងកុំព្យូទ័រសម្រាប់ស្រាវជ្រាវ។',
                'body_en' => 'Kamrieng High School library has over 5,000 books in both Khmer and English, along with an air-conditioned reading room and computers for research.',
            ],
            [
                'key' => 'enroll-guide',
                'title_km' => 'ការណែនាំអំពីការចុះឈ្មោះ',
                'title_en' => 'Enrollment Guide',
                'body_km' => 'ការចុះឈ្មោះចូលរៀននៅវិទ្យាល័យកំរៀង មាន ៣ ជំហាន៖ (១) បំពេញពាក្យសុំ (២) ប្រឡងជ្រើសរើស (៣) បង់ថ្លៃសិក្សា។ សូមទំនាក់ទំនងការិយាល័យសាលាសម្រាប់ព័ត៌មានបន្ថែម។',
                'body_en' => 'Enrollment at Kamrieng High School has 3 steps: (1) Submit application (2) Entrance exam (3) Pay tuition fees. Please contact the school office for more information.',
            ],
            [
                'key' => 'contact-us',
                'title_km' => 'ទំនាក់ទំនងយើងខ្ញុំ',
                'title_en' => 'Contact Us',
                'body_km' => 'អាសយដ្ឋាន៖ វិទ្យាល័យកំរៀង ស្រុកកំរៀង ខេត្តបាត់ដំបង។ ទូរស័ព្ទ៖ (០៥៣) ១២៣ ៤៥៦។ អ៊ីមែល៖ info@kamrieng.edu.kh',
                'body_en' => 'Address: Kamrieng High School, Kamrieng District, Battambang Province. Phone: (053) 123 456. Email: info@kamrieng.edu.kh',
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }

        // ─── Achievements (15 items) ───────────────────────────────
        $achievements = [
            [
                'title_km' => 'សិស្សពូកែថ្នាក់ស្រុក',
                'title_en' => 'District Top Student Award',
                'type' => 'student',
                'award_level' => 'district',
                'description' => 'សិស្សានុសិស្សវិទ្យាល័យកំរៀងទទួលបានពានរង្វាន់សិស្សពូកែថ្នាក់ស្រុក ក្នុងការប្រឡងប្រជែងចំណេះដឹងទូទៅ / Kamrieng High School students won the District Top Student Award in the general knowledge competition.',
                'awarded_on' => '2026-05-15',
            ],
            [
                'title_km' => 'គ្រូបង្រៀនគំរូ',
                'title_en' => 'Model Teacher Award',
                'type' => 'teacher',
                'award_level' => 'provincial',
                'description' => 'លោកគ្រូ សុខ សុភាព ទទួលបានពានរង្វាន់គ្រូបង្រៀនគំរូថ្នាក់ខេត្ត / Teacher Sok Sopha received the Provincial Model Teacher Award.',
                'awarded_on' => '2026-01-20',
            ],
            [
                'title_km' => 'សាលារៀនបៃតង',
                'title_en' => 'Green School Certificate',
                'type' => 'school',
                'award_level' => 'national',
                'description' => 'វិទ្យាល័យកំរៀងទទួលបានវិញ្ញាបនបត្រសាលារៀនបៃតង ពីក្រសួងបរិស្ថាន / Kamrieng High School received the Green School Certificate from the Ministry of Environment.',
                'awarded_on' => '2026-04-22',
            ],
            [
                'title_km' => 'ជើងឯកកីឡាបាល់ទាត់ថ្នាក់ស្រុក',
                'title_en' => 'District Football Champion',
                'type' => 'student',
                'award_level' => 'district',
                'description' => 'ក្រុមកីឡាបាល់ទាត់វិទ្យាល័យកំរៀង បានឈ្នះពានរង្វាន់ជើងឯកកីឡាបាល់ទាត់ថ្នាក់ស្រុក / Kamrieng High School football team won the District Football Champion title.',
                'awarded_on' => '2026-07-01',
            ],
            [
                'title_km' => 'ការប្រកួតប្រជែងសរសេរអត្ថបទថ្នាក់ជាតិ',
                'title_en' => 'National Essay Competition Winner',
                'type' => 'student',
                'award_level' => 'national',
                'description' => 'សិស្សានុសិស្សវិទ្យាល័យកំរៀងទទួលបានចំណាត់ថ្នាក់លេខ ១ ក្នុងការប្រកួតប្រជែងសរសេរអត្ថបទថ្នាក់ជាតិ / Kamrieng High School students won 1st place in the National Essay Competition.',
                'awarded_on' => '2026-09-10',
            ],
            [
                'title_km' => 'ពានរង្វាន់កីឡាបាល់ទះថ្នាក់ខេត្ត',
                'title_en' => 'Provincial Volleyball Award',
                'type' => 'student',
                'award_level' => 'provincial',
                'description' => 'ក្រុមកីឡាបាល់ទះវិទ្យាល័យកំរៀងទទួលបានចំណាត់ថ្នាក់លេខ ២ ក្នុងការប្រកួតកីឡាបាល់ទះថ្នាក់ខេត្ត / Kamrieng High School volleyball team won 2nd place in the Provincial Volleyball Competition.',
                'awarded_on' => '2026-08-15',
            ],
            [
                'title_km' => 'គ្រូបង្រៀនឆ្នើមប្រចាំឆ្នាំ',
                'title_en' => 'Teacher of the Year',
                'type' => 'teacher',
                'award_level' => 'district',
                'description' => 'លោកស្រី នួន ស្រីពេជ្រ ទទួលបានពានរង្វាន់គ្រូបង្រៀនឆ្នើមប្រចាំឆ្នាំថ្នាក់ស្រុក / Ms. Nuon Srey Pich received the District Teacher of the Year award.',
                'awarded_on' => '2026-10-05',
            ],
            [
                'title_km' => 'ការប្រកួតប្រជែងសូត្រកំណាព្យថ្នាក់ស្រុក',
                'title_en' => 'District Poetry Recitation Winner',
                'type' => 'student',
                'award_level' => 'district',
                'description' => 'សិស្សានុសិស្សវិទ្យាល័យកំរៀងទទួលបានចំណាត់ថ្នាក់លេខ ១ ក្នុងការប្រកួតសូត្រកំណាព្យថ្នាក់ស្រុក / Kamrieng High School students won 1st place in the District Poetry Recitation Competition.',
                'awarded_on' => '2026-03-20',
            ],
            [
                'title_km' => 'ការប្រកួតប្រជែងស្រាវជ្រាវវិទ្យាសាស្រ្ត',
                'title_en' => 'Science Research Competition Finalist',
                'type' => 'student',
                'award_level' => 'national',
                'description' => 'សិស្សថ្នាក់ទី១២ ចំនួន ៣ នាក់ បានទៅដល់វគ្គផ្តាច់ព្រ័ត្រក្នុងការប្រកួតស្រាវជ្រាវវិទ្យាសាស្រ្តថ្នាក់ជាតិ / Three 12th grade students reached the finals of the National Science Research Competition.',
                'awarded_on' => '2026-11-30',
            ],
            [
                'title_km' => 'សាលារៀនគំរូផ្នែកបរិស្ថាន',
                'title_en' => 'Model Environmental School',
                'type' => 'school',
                'award_level' => 'provincial',
                'description' => 'វិទ្យាល័យកំរៀងត្រូវបានទទួលស្គាល់ជាសាលារៀនគំរូផ្នែកបរិស្ថានថ្នាក់ខេត្ត / Kamrieng High School was recognized as a Provincial Model Environmental School.',
                'awarded_on' => '2026-06-05',
            ],
            [
                'title_km' => 'ជើងឯកកីឡាបាល់បោះថ្នាក់ស្រុក',
                'title_en' => 'District Basketball Champion',
                'type' => 'student',
                'award_level' => 'district',
                'description' => 'ក្រុមកីឡាបាល់បោះវិទ្យាល័យកំរៀង បានឈ្នះពានរង្វាន់ជើងឯកថ្នាក់ស្រុក / Kamrieng High School basketball team won the District Championship title.',
                'awarded_on' => '2026-02-28',
            ],
            [
                'title_km' => 'វិញ្ញាបនបត្រគ្រូបង្រៀនឆ្នើមខេត្ត',
                'title_en' => 'Provincial Excellent Teacher Certificate',
                'type' => 'teacher',
                'award_level' => 'provincial',
                'description' => 'លោកគ្រូ ថោង វិជ័យ ទទួលបានវិញ្ញាបនបត្រគ្រូបង្រៀនរូបវិទ្យាឆ្នើមថ្នាក់ខេត្ត / Teacher Thong Vichea received the Provincial Excellent Physics Teacher certificate.',
                'awarded_on' => '2026-09-30',
            ],
            [
                'title_km' => 'ពានរង្វាន់កីឡាតេក្វាន់ដូខេត្ត',
                'title_en' => 'Provincial Taekwondo Medal',
                'type' => 'student',
                'award_level' => 'provincial',
                'description' => 'សិស្សានុសិស្សវិទ្យាល័យកំរៀង ទទួលបានមេដាយមាស និងប្រាក់ ក្នុងការប្រកួតតេក្វាន់ដូថ្នាក់ខេត្ត / Kamrieng High School students won gold and silver medals in the Provincial Taekwondo competition.',
                'awarded_on' => '2026-04-20',
            ],
            [
                'title_km' => 'សាលារៀនគ្មានគ្រឿងញៀន',
                'title_en' => 'Drug-Free School Certification',
                'type' => 'school',
                'award_level' => 'national',
                'description' => 'វិទ្យាល័យកំរៀង ទទួលបានវិញ្ញាបនបត្រសាលារៀនគ្មានគ្រឿងញៀនពីអាជ្ញាធរជាតិ / Kamrieng High School received Drug-Free School certification from national authorities.',
                'awarded_on' => '2026-10-12',
            ],
            [
                'title_km' => 'ជើងឯកការប្រកួតប្រជែងសរសេរអត្ថបទខេត្ត',
                'title_en' => 'Provincial Essay Writing Champion',
                'type' => 'student',
                'award_level' => 'provincial',
                'description' => 'សិស្សានុសិស្សវិទ្យាល័យកំរៀងទទួលបានចំណាត់ថ្នាក់លេខ ១ ក្នុងការប្រកួតសរសេរអត្ថបទថ្នាក់ខេត្ត / Kamrieng High School students won 1st place in the Provincial Essay Writing Competition.',
                'awarded_on' => '2026-05-10',
            ],
        ];

        foreach ($achievements as $ach) {
            Achievement::create($ach);
        }

        // ─── Notices (15 items) ────────────────────────────────────
        $notices = [
            [
                'title_km' => 'ការប្រកាសឈប់សម្រាកបុណ្យភ្ជុំបិណ្ឌ',
                'title_en' => 'Pchum Ben Holiday Notice',
                'body_km' => 'សាលារៀននឹងឈប់សម្រាករយៈពេល ៥ ថ្ងៃ ចាប់ពីថ្ងៃទី ២៥ ដល់ ២៩ ខែកញ្ញា។ សូមសិស្សានុសិស្សទាំងអស់គោរពតាមកាលវិភាគ។',
                'body_en' => 'School will be closed for 5 days from September 25 to 29. All students are requested to follow the schedule.',
                'is_urgent' => false,
                'starts_at' => '2026-06-20 00:00:00',
                'ends_at' => '2026-10-01 00:00:00',
            ],
            [
                'title_km' => 'ការប្រឡងពាក់កណ្តាលឆ្នាំ',
                'title_en' => 'Midterm Exam Schedule',
                'body_km' => 'ការប្រឡងពាក់កណ្តាលឆ្នាំនឹងប្រព្រឹត្តទៅចាប់ពីថ្ងៃទី ១៥ ដល់ ២០ ខែវិច្ឆិកា។ សូមសិស្សានុសិស្សត្រៀមខ្លួនឱ្យបានស្អាត។',
                'body_en' => 'Midterm exams will be held from November 15 to 20. Students are advised to prepare well.',
                'is_urgent' => true,
                'starts_at' => '2026-07-01 00:00:00',
                'ends_at' => '2026-11-22 00:00:00',
            ],
            [
                'title_km' => 'ការចុះឈ្មោះចូលរៀនឆ្នាំសិក្សាថ្មី',
                'title_en' => 'New Academic Year Enrollment',
                'body_km' => 'ចាប់ពីថ្ងៃទី ១ ខែតុលា សាលារៀនបើកទទួលចុះឈ្មោះសិស្សថ្មីសម្រាប់ឆ្នាំសិក្សា ២០២៦-២០២៧។',
                'body_en' => 'Starting October 1, the school is accepting new student enrollments for the 2026-2027 academic year.',
                'is_urgent' => false,
                'starts_at' => '2026-06-01 00:00:00',
                'ends_at' => '2026-12-31 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកួតកីឡាសាលារៀន',
                'title_en' => 'School Sports Competition',
                'body_km' => 'ការប្រកួតកីឡាបាល់ទាត់ និងបាល់ទះ នឹងប្រព្រឹត្តទៅនៅថ្ងៃសៅរ៍ ទី ១៥ ខែតុលា។ សូមសិស្សានុសិស្សចុះឈ្មោះនៅការិយាល័យកីឡា។',
                'body_en' => 'Football and volleyball competitions will be held on Saturday, October 15. Students please register at the sports office.',
                'is_urgent' => false,
                'starts_at' => '2026-06-15 00:00:00',
                'ends_at' => '2026-10-20 00:00:00',
            ],
            [
                'title_km' => 'ការប្រឡងសញ្ញាបត្រមធ្យមសិក្សាទុតិយភូមិ',
                'title_en' => 'Baccalaureate Exam Notice',
                'body_km' => 'ការប្រឡងសញ្ញាបត្រមធ្យមសិក្សាទុតិយភូមិ នឹងប្រព្រឹត្តទៅចាប់ពីថ្ងៃទី ២០ ខែធ្នូ។ សូមសិស្សានុសិស្សថ្នាក់ទី១២ ត្រៀមឯកសារឱ្យបានពេញលេញ។',
                'body_en' => 'The Baccalaureate exam will be held starting December 20. Grade 12 students should prepare all documents.',
                'is_urgent' => true,
                'starts_at' => '2026-12-01 00:00:00',
                'ends_at' => '2026-12-25 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកាសផ្អាកសិក្សាដោយសារភ្លៀងធ្លាក់',
                'title_en' => 'Class Suspension Due to Heavy Rain',
                'body_km' => 'សាលារៀនប្រកាសផ្អាកការសិក្សានៅថ្ងៃស្អែក ដោយសារការព្យាករណ៍អាកាសធាតុមានភ្លៀងធ្លាក់ខ្លាំង។ សូមសិស្សានុសិស្សទាំងអស់នៅផ្ទះ។',
                'body_en' => 'The school announces a class suspension tomorrow due to heavy rain weather forecast. All students should stay home.',
                'is_urgent' => true,
                'starts_at' => '2026-07-10 00:00:00',
                'ends_at' => '2026-07-12 00:00:00',
            ],
            [
                'title_km' => 'ការបើកដំណើរការកម្មវិធីបណ្ណាល័យឌីជីថល',
                'title_en' => 'Digital Library Launch',
                'body_km' => 'សាលារៀនមានសេចក្តីសោមនស្សរីករាយក្នុងការប្រកាសបើកដំណើរការបណ្ណាល័យឌីជីថល ដែលសិស្សានុសិស្សអាចខ្ចីសៀវភៅតាមអនឡាញ។',
                'body_en' => 'The school is pleased to announce the launch of a digital library where students can borrow books online.',
                'is_urgent' => false,
                'starts_at' => '2026-08-01 00:00:00',
                'ends_at' => '2026-12-31 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកាសជ្រើសរើសសិស្សថ្មី',
                'title_en' => 'New Student Selection Announcement',
                'body_km' => 'ការប្រឡងជ្រើសរើសសិស្សថ្មីសម្រាប់ឆ្នាំសិក្សា ២០២៦-២០២៧ នឹងប្រព្រឹត្តទៅនៅថ្ងៃទី ១៥ ខែតុលា។ សូមសិស្សានុសិស្សដែលចាប់អារម្មណ៍មកចុះឈ្មោះ។',
                'body_en' => 'The entrance exam for new students for the 2026-2027 academic year will be held on October 15. Interested students please register.',
                'is_urgent' => false,
                'starts_at' => '2026-09-01 00:00:00',
                'ends_at' => '2026-10-20 00:00:00',
            ],
            [
                'title_km' => 'ការប្រឡងសមត្ថភាពគ្រូបង្រៀន',
                'title_en' => 'Teacher Competency Exam',
                'body_km' => 'ការប្រឡងសមត្ថភាពគ្រូបង្រៀនប្រចាំឆ្នាំនឹងប្រព្រឹត្តទៅនៅថ្ងៃទី ៥ ខែកញ្ញា។ សូមលោកគ្រូអ្នកគ្រូទាំងអស់ចូលរួមប្រឡង។',
                'body_en' => 'The annual teacher competency exam will be held on September 5. All teachers are required to participate.',
                'is_urgent' => true,
                'starts_at' => '2026-08-15 00:00:00',
                'ends_at' => '2026-09-10 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកាសបិទសាលារៀនសម្រាប់បុណ្យចូលឆ្នាំខ្មែរ',
                'title_en' => 'Khmer New Year School Closure',
                'body_km' => 'សាលារៀននឹងបិទរយៈពេល ៣ ថ្ងៃ ចាប់ពីថ្ងៃទី ១៤ ដល់ ១៦ ខែមេសា ដើម្បីបុណ្យចូលឆ្នាំខ្មែរ។ សូមសិស្សានុសិស្សទាំងអស់ប្រារព្ធពិធីបុណ្យដោយសុវត្ថិភាព។',
                'body_en' => 'School will be closed for 3 days from April 14 to 16 for Khmer New Year. All students celebrate safely.',
                'is_urgent' => false,
                'starts_at' => '2026-03-20 00:00:00',
                'ends_at' => '2026-04-20 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកាសចុះឈ្មោះចូលរួមកម្មវិធីសិក្សាបន្ថែម',
                'title_en' => 'Extra Class Enrollment Notice',
                'body_km' => 'សាលារៀនបើកទទួលចុះឈ្មោះសម្រាប់វគ្គសិក្សាបន្ថែមផ្នែកភាសាអង់គ្លេស និងគណិតវិទ្យា។ សូមចុះឈ្មោះនៅការិយាល័យសាលាត្រឹមថ្ងៃទី ១៥ ខែសីហា។',
                'body_en' => 'The school is accepting enrollment for extra classes in English and Mathematics. Please register at the school office by August 15.',
                'is_urgent' => false,
                'starts_at' => '2026-07-01 00:00:00',
                'ends_at' => '2026-08-20 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកាសប្រឡងសមត្ថភាពសិស្សថ្នាក់ទី៩',
                'title_en' => 'Grade 9 Assessment Exam Notice',
                'body_km' => 'ការប្រឡងវាយតម្លៃសមត្ថភាពសិស្សថ្នាក់ទី៩ នឹងប្រព្រឹត្តទៅនៅថ្ងៃទី ១០ ខែកក្កដា។ សូមសិស្សានុសិស្សត្រៀមខ្លួន។',
                'body_en' => 'Grade 9 student assessment exam will be held on July 10. Students please prepare.',
                'is_urgent' => true,
                'starts_at' => '2026-06-25 00:00:00',
                'ends_at' => '2026-07-15 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកាសកម្មវិធីបរិច្ចាគឈាម',
                'title_en' => 'Blood Donation Event Notice',
                'body_km' => 'កម្មវិធីបរិច្ចាគឈាមប្រចាំឆ្នាំនឹងប្រព្រឹត្តទៅនៅថ្ងៃទី ១៥ ខែមិថុនា។ សូមលោកគ្រូអ្នកគ្រូ និងសិស្សានុសិស្សចូលរួម។',
                'body_en' => 'The annual blood donation event will be held on June 15. Teachers and students are encouraged to participate.',
                'is_urgent' => false,
                'starts_at' => '2026-06-01 00:00:00',
                'ends_at' => '2026-06-18 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកាសជួសជុលអគារសិក្សា',
                'title_en' => 'School Building Renovation Notice',
                'body_km' => 'សាលារៀននឹងជួសជុលអគារសិក្សាធំ ចាប់ពីថ្ងៃទី ២០ ខែកក្កដា ដល់ថ្ងៃទី ១០ ខែសីហា។ ក្នុងអំឡុងពេលនេះ ការសិក្សានឹងប្តូរទៅអគារបណ្តោះអាសន្ន។',
                'body_en' => 'The school will renovate the main academic building from July 20 to August 10. During this time, classes will move to temporary buildings.',
                'is_urgent' => true,
                'starts_at' => '2026-07-10 00:00:00',
                'ends_at' => '2026-08-15 00:00:00',
            ],
            [
                'title_km' => 'ការប្រកាសឈប់សម្រាកសាលារៀនបុណ្យឯករាជ្យ',
                'title_en' => 'Independence Day Holiday Notice',
                'body_km' => 'សាលារៀននឹងឈប់សម្រាកនៅថ្ងៃទី ៩ ខែវិច្ឆិកា ដើម្បីប្រារព្ធទិវាឯករាជ្យជាតិ។ សូមសិស្សានុសិស្សទាំងអស់គោរពតាមកាលវិភាគ។',
                'body_en' => 'School will be closed on November 9 for Independence Day celebration. All students are requested to follow the schedule.',
                'is_urgent' => false,
                'starts_at' => '2026-10-01 00:00:00',
                'ends_at' => '2026-11-15 00:00:00',
            ],
        ];

        foreach ($notices as $notice) {
            Notice::create($notice);
        }

        // ─── Leadership (16 items) ─────────────────────────────────
        $leadership = [
            [
                'name_km' => 'លោក ហេង សំណាង',
                'name_en' => 'Mr. Heng Samnang',
                'position_km' => 'នាយកសាលា',
                'position_en' => 'School Principal',
                'bio_km' => 'លោក ហេង សំណាង ជានាយកសាលាដែលមានបទពិសោធន៍ជាង ២០ ឆ្នាំក្នុងវិស័យអប់រំ។ លោកបានដឹកនាំសាលារៀនឱ្យមានការអភិវឌ្ឍន៍ជាបន្តបន្ទាប់។',
                'bio_en' => 'Mr. Heng Samnang is a school principal with over 20 years of experience in education. He has led the school to continuous development.',
                'sort_order' => 1,
            ],
            [
                'name_km' => 'លោកស្រី ជា សុភាព',
                'name_en' => 'Ms. Chea Sopheap',
                'position_km' => 'នាយករង',
                'position_en' => 'Vice Principal',
                'bio_km' => 'លោកស្រី ជា សុភាព ទទួលបន្ទុកផ្នែកគ្រប់គ្រងកម្មវិធីសិក្សា និងការអភិវឌ្ឍន៍គ្រូបង្រៀន។',
                'bio_en' => 'Ms. Chea Sopheap is in charge of curriculum management and teacher development.',
                'sort_order' => 2,
            ],
            [
                'name_km' => 'លោក សុខ សុភាព',
                'name_en' => 'Mr. Sok Sopheap',
                'position_km' => 'ប្រធានផ្នែកវិទ្យាសាស្រ្ត',
                'position_en' => 'Head of Science Department',
                'bio_km' => 'លោក សុខ សុភាព ជាគ្រូបង្រៀនផ្នែកគីមីវិទ្យា និងទទួលបន្ទុកផ្នែកវិទ្យាសាស្រ្តទាំងមូល។',
                'bio_en' => 'Mr. Sok Sopheap is a chemistry teacher and heads the entire Science Department.',
                'sort_order' => 3,
            ],
            [
                'name_km' => 'លោកស្រី នួន ស្រីពេជ្រ',
                'name_en' => 'Ms. Nuon Srey Pich',
                'position_km' => 'ប្រធានផ្នែកភាសា',
                'position_en' => 'Head of Languages Department',
                'bio_km' => 'លោកស្រី នួន ស្រីពេជ្រ ជាគ្រូបង្រៀនភាសាខ្មែរ និងភាសាអង់គ្លេស មានបទពិសោធន៍ ១៥ ឆ្នាំ។',
                'bio_en' => 'Ms. Nuon Srey Pich is a Khmer and English language teacher with 15 years of experience.',
                'sort_order' => 4,
            ],
            [
                'name_km' => 'លោក ម៉ៅ វិសាល',
                'name_en' => 'Mr. Mao Visal',
                'position_km' => 'ប្រធានផ្នែកកីឡា',
                'position_en' => 'Head of Sports Department',
                'bio_km' => 'លោក ម៉ៅ វិសាល ទទួលបន្ទុកផ្នែកកីឡា និងសកម្មភាពក្រៅម៉ោងសិក្សា។',
                'bio_en' => 'Mr. Mao Visal is in charge of sports and extracurricular activities.',
                'sort_order' => 5,
            ],
            [
                'name_km' => 'លោកស្រី ប៉ែន ច័ន្ទនារី',
                'name_en' => 'Ms. Pen Chan Nary',
                'position_km' => 'បណ្ណារក្ស',
                'position_en' => 'Librarian',
                'bio_km' => 'លោកស្រី ប៉ែន ច័ន្ទនារី ទទួលបន្ទុកគ្រប់គ្រងបណ្ណាល័យ និងជំរុញការអានរបស់សិស្ស។',
                'bio_en' => 'Ms. Pen Chan Nary manages the library and promotes reading among students.',
                'sort_order' => 6,
            ],
            [
                'name_km' => 'លោក សុខ ចាន់ដារ៉ា',
                'name_en' => 'Mr. Sok Chandara',
                'position_km' => 'ប្រធានផ្នែកគណនេយ្យ',
                'position_en' => 'Head of Accounting',
                'bio_km' => 'លោក សុខ ចាន់ដារ៉ា ទទួលបន្ទុកផ្នែកហិរញ្ញវត្ថុ និងគណនេយ្យរបស់សាលារៀន។',
                'bio_en' => 'Mr. Sok Chandara is in charge of the school\'s finance and accounting department.',
                'sort_order' => 7,
            ],
            [
                'name_km' => 'លោកស្រី ស៊ុន ម៉ាលី',
                'name_en' => 'Ms. Sun Mali',
                'position_km' => 'គ្រូបង្រៀនគណិតវិទ្យា',
                'position_en' => 'Mathematics Teacher',
                'bio_km' => 'លោកស្រី ស៊ុន ម៉ាលី ជាគ្រូបង្រៀនគណិតវិទ្យាដែលមានបទពិសោធន៍ ១០ ឆ្នាំ។',
                'bio_en' => 'Ms. Sun Mali is a mathematics teacher with 10 years of experience.',
                'sort_order' => 8,
            ],
            [
                'name_km' => 'លោក ថោង វិជ័យ',
                'name_en' => 'Mr. Thong Vichea',
                'position_km' => 'គ្រូបង្រៀនរូបវិទ្យា',
                'position_en' => 'Physics Teacher',
                'bio_km' => 'លោក ថោង វិជ័យ ជាគ្រូបង្រៀនរូបវិទ្យាដែលមានបទពិសោធន៍ ១២ ឆ្នាំ។',
                'bio_en' => 'Mr. Thong Vichea is a physics teacher with 12 years of experience.',
                'sort_order' => 9,
            ],
            [
                'name_km' => 'លោកស្រី សែ សុខុម',
                'name_en' => 'Ms. Sea Sokhom',
                'position_km' => 'គ្រូបង្រៀនភាសាអង់គ្លេស',
                'position_en' => 'English Teacher',
                'bio_km' => 'លោកស្រី សែ សុខុម ជាគ្រូបង្រៀនភាសាអង់គ្លេសដែលមានបទពិសោធន៍ ៨ ឆ្នាំ។',
                'bio_en' => 'Ms. Sea Sokhom is an English teacher with 8 years of experience.',
                'sort_order' => 10,
            ],
            [
                'name_km' => 'លោក កែវ សុភ័ក្រ',
                'name_en' => 'Mr. Keo Sophak',
                'position_km' => 'គ្រូបង្រៀនប្រវត្តិវិទ្យា',
                'position_en' => 'History Teacher',
                'bio_km' => 'លោក កែវ សុភ័ក្រ ជាគ្រូបង្រៀនប្រវត្តិវិទ្យាដែលមានបទពិសោធន៍ ១៥ ឆ្នាំ។',
                'bio_en' => 'Mr. Keo Sophak is a history teacher with 15 years of experience.',
                'sort_order' => 11,
            ],
            [
                'name_km' => 'លោកស្រី ថោង ស្រីមុំ',
                'name_en' => 'Ms. Thong Srey Mom',
                'position_km' => 'គ្រូបង្រៀនជីវវិទ្យា',
                'position_en' => 'Biology Teacher',
                'bio_km' => 'លោកស្រី ថោង ស្រីមុំ ជាគ្រូបង្រៀនជីវវិទ្យាដែលមានបទពិសោធន៍ ៩ ឆ្នាំ។',
                'bio_en' => 'Ms. Thong Srey Mom is a biology teacher with 9 years of experience.',
                'sort_order' => 12,
            ],
            [
                'name_km' => 'លោក សុខ គឹមហេង',
                'name_en' => 'Mr. Sok Kimheng',
                'position_km' => 'គ្រូបង្រៀនគីមីវិទ្យា',
                'position_en' => 'Chemistry Teacher',
                'bio_km' => 'លោក សុខ គឹមហេង ជាគ្រូបង្រៀនគីមីវិទ្យាដែលមានបទពិសោធន៍ ១១ ឆ្នាំ។',
                'bio_en' => 'Mr. Sok Kimheng is a chemistry teacher with 11 years of experience.',
                'sort_order' => 13,
            ],
            [
                'name_km' => 'លោកស្រី ម៉ៅ សុភ័ក្រ',
                'name_en' => 'Ms. Mao Sophak',
                'position_km' => 'គ្រូបង្រៀនភូមិវិទ្យា',
                'position_en' => 'Geography Teacher',
                'bio_km' => 'លោកស្រី ម៉ៅ សុភ័ក្រ ជាគ្រូបង្រៀនភូមិវិទ្យាដែលមានបទពិសោធន៍ ១៣ ឆ្នាំ។',
                'bio_en' => 'Ms. Mao Sophak is a geography teacher with 13 years of experience.',
                'sort_order' => 14,
            ],
            [
                'name_km' => 'លោក ជា សុខហេង',
                'name_en' => 'Mr. Chea Sokheng',
                'position_km' => 'គ្រូបង្រៀនកុំព្យូទ័រ',
                'position_en' => 'Computer Teacher',
                'bio_km' => 'លោក ជា សុខហេង ជាគ្រូបង្រៀនផ្នែកព័ត៌មានវិទ្យា មានបទពិសោធន៍ ៧ ឆ្នាំ។',
                'bio_en' => 'Mr. Chea Sokheng is an IT teacher with 7 years of experience.',
                'sort_order' => 15,
            ],
            [
                'name_km' => 'លោកស្រី នួន ថេតា',
                'name_en' => 'Ms. Nuon Theta',
                'position_km' => 'គ្រូបង្រៀនសិល្បៈ',
                'position_en' => 'Arts Teacher',
                'bio_km' => 'លោកស្រី នួន ថេតា ជាគ្រូបង្រៀនសិល្បៈដែលមានបទពិសោធន៍ ៦ ឆ្នាំ។',
                'bio_en' => 'Ms. Nuon Theta is an arts teacher with 6 years of experience.',
                'sort_order' => 16,
            ],
        ];

        foreach ($leadership as $leader) {
            Leadership::create($leader);
        }

        // ─── Documents (16 items) ──────────────────────────────────
        $documents = [
            [
                'title_km' => 'ទម្រង់ពាក្យសុំចុះឈ្មោះចូលរៀន',
                'title_en' => 'Enrollment Application Form',
                'file_path' => 'documents/enrollment-form.pdf',
                'file_size' => 245760,
                'category' => 'form',
            ],
            [
                'title_km' => 'ប្រតិទិនសិក្សា ២០២៦-២០២៧',
                'title_en' => 'Academic Calendar 2026-2027',
                'file_path' => 'documents/academic-calendar-2026-2027.pdf',
                'file_size' => 524288,
                'category' => 'calendar',
            ],
            [
                'title_km' => 'សៀវភៅណែនាំសាលារៀន',
                'title_en' => 'School Handbook',
                'file_path' => 'documents/school-handbook.pdf',
                'file_size' => 1048576,
                'category' => 'guide',
            ],
            [
                'title_km' => 'គោលការណ៍ និងបទបញ្ជារបស់សាលា',
                'title_en' => 'School Rules and Regulations',
                'file_path' => 'documents/school-rules.pdf',
                'file_size' => 314572,
                'category' => 'policy',
            ],
            [
                'title_km' => 'សំបុត្រអញ្ជើញសន្និសីទមាតាបិតា',
                'title_en' => 'Parent Conference Invitation',
                'file_path' => 'documents/parent-conference-invitation.pdf',
                'file_size' => 198765,
                'category' => 'letter',
            ],
            [
                'title_km' => 'ពាក្យសុំអាហារូបករណ៍',
                'title_en' => 'Scholarship Application',
                'file_path' => 'documents/scholarship-application.pdf',
                'file_size' => 289012,
                'category' => 'form',
            ],
            [
                'title_km' => 'វិញ្ញាបនបត្រសិក្សា',
                'title_en' => 'Academic Transcript Request',
                'file_path' => 'documents/transcript-request.pdf',
                'file_size' => 156789,
                'category' => 'form',
            ],
            [
                'title_km' => 'ប្រតិទិនប្រឡងប្រចាំឆ្នាំ',
                'title_en' => 'Annual Exam Schedule',
                'file_path' => 'documents/exam-schedule-2026.pdf',
                'file_size' => 345678,
                'category' => 'calendar',
            ],
            [
                'title_km' => 'ឯកសារណែនាំការប្រឡងថ្នាក់ជាតិ',
                'title_en' => 'National Exam Guide',
                'file_path' => 'documents/national-exam-guide.pdf',
                'file_size' => 567890,
                'category' => 'guide',
            ],
            [
                'title_km' => 'ពាក្យសុំច្បាប់ឈប់សំរាកសិស្ស',
                'title_en' => 'Student Leave Request Form',
                'file_path' => 'documents/leave-request-form.pdf',
                'file_size' => 123456,
                'category' => 'form',
            ],
            [
                'title_km' => 'របាយការណ៍ហិរញ្ញវត្ថុប្រចាំឆ្នាំ',
                'title_en' => 'Annual Financial Report',
                'file_path' => 'documents/annual-financial-report-2025.pdf',
                'file_size' => 789012,
                'category' => 'report',
            ],
            [
                'title_km' => 'ពាក្យសុំចុះឈ្មោះចូលរៀនថ្នាក់មត្តេយ្យ',
                'title_en' => 'Kindergarten Enrollment Form',
                'file_path' => 'documents/kindergarten-enrollment.pdf',
                'file_size' => 234567,
                'category' => 'form',
            ],
            [
                'title_km' => 'ប្រតិទិនប្រឡងពាក់កណ្តាលឆ្នាំ',
                'title_en' => 'Midterm Exam Calendar',
                'file_path' => 'documents/midterm-exam-calendar.pdf',
                'file_size' => 198765,
                'category' => 'calendar',
            ],
            [
                'title_km' => 'សៀវភៅណែនាំសម្រាប់សិស្សថ្មី',
                'title_en' => 'New Student Orientation Guide',
                'file_path' => 'documents/new-student-guide.pdf',
                'file_size' => 456789,
                'category' => 'guide',
            ],
            [
                'title_km' => 'គោលការណ៍វិន័យសាលារៀន',
                'title_en' => 'School Discipline Policy',
                'file_path' => 'documents/discipline-policy.pdf',
                'file_size' => 345678,
                'category' => 'policy',
            ],
            [
                'title_km' => 'ពាក្យសុំច្បាប់ឈប់សម្រាកគ្រូ',
                'title_en' => 'Teacher Leave Request Form',
                'file_path' => 'documents/teacher-leave-form.pdf',
                'file_size' => 123456,
                'category' => 'form',
            ],
        ];

        foreach ($documents as $doc) {
            Document::create($doc);
        }

        // ─── Galleries (14 items) ──────────────────────────────────
        $galleries = [
            [
                'title_km' => 'កម្មវិធីបើកសាលាថ្មី',
                'title_en' => 'New School Opening Ceremony',
                'year' => 2026,
                'category' => 'event',
            ],
            [
                'title_km' => 'ការប្រកួតកីឡាប្រចាំឆ្នាំ',
                'title_en' => 'Annual Sports Competition',
                'year' => 2026,
                'category' => 'sports',
            ],
            [
                'title_km' => 'សកម្មភាពសិក្សាក្រៅម៉ោង',
                'title_en' => 'Extracurricular Activities',
                'year' => 2025,
                'category' => 'activity',
            ],
            [
                'title_km' => 'ពិធីប្រគល់សញ្ញាបត្រ',
                'title_en' => 'Graduation Ceremony',
                'year' => 2025,
                'category' => 'event',
            ],
            [
                'title_km' => 'ទិវាបរិស្ថានសាលារៀន',
                'title_en' => 'School Environment Day',
                'year' => 2026,
                'category' => 'activity',
            ],
            [
                'title_km' => 'កម្មវិធីសប្បុរសធម៌',
                'title_en' => 'Charity Program',
                'year' => 2026,
                'category' => 'event',
            ],
            [
                'title_km' => 'ការតាំងពិព័រណ៍វិទ្យាសាស្រ្ត',
                'title_en' => 'Science Fair',
                'year' => 2025,
                'category' => 'activity',
            ],
            [
                'title_km' => 'ពិធីបុណ្យអុំទូក',
                'title_en' => 'Boat Racing Festival',
                'year' => 2025,
                'category' => 'event',
            ],
            [
                'title_km' => 'ទិវាគ្រូបង្រៀន',
                'title_en' => 'Teachers Day Celebration',
                'year' => 2026,
                'category' => 'event',
            ],
            [
                'title_km' => 'ទិវាកុមារអន្តរជាតិ',
                'title_en' => 'International Children Day',
                'year' => 2026,
                'category' => 'event',
            ],
            [
                'title_km' => 'កម្មវិធីដាំកូនឈើ',
                'title_en' => 'Tree Planting Event',
                'year' => 2026,
                'category' => 'activity',
            ],
            [
                'title_km' => 'ការប្រកួតតេក្វាន់ដូ',
                'title_en' => 'Taekwondo Competition',
                'year' => 2026,
                'category' => 'sports',
            ],
            [
                'title_km' => 'ពិធីបុណ្យចូលឆ្នាំខ្មែរ',
                'title_en' => 'Khmer New Year Celebration',
                'year' => 2026,
                'category' => 'event',
            ],
            [
                'title_km' => 'សិក្ខាសាលាណែនាំអាជីព',
                'title_en' => 'Career Guidance Workshop',
                'year' => 2026,
                'category' => 'activity',
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }

        $this->command->info('✅ Content seeded successfully!');
        $this->command->info('   - ' . Activity::count() . ' activities');
        $this->command->info('   - ' . Event::count() . ' events');
        $this->command->info('   - ' . News::count() . ' news articles');
        $this->command->info('   - ' . Page::count() . ' pages');
        $this->command->info('   - ' . Achievement::count() . ' achievements');
        $this->command->info('   - ' . Notice::count() . ' notices');
        $this->command->info('   - ' . Leadership::count() . ' leadership members');
        $this->command->info('   - ' . Document::count() . ' documents');
        $this->command->info('   - ' . Gallery::count() . ' galleries');
    }
}
