<?php

namespace Tests\Unit\Models;

use App\Models\Leadership;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeadershipTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_searches_by_khmer_name()
    {
        Leadership::factory()->create([
            'name_km' => 'សុខ សុភា',
            'name_en' => 'Sok Sophea',
            'position_en' => 'Principal',
        ]);
        Leadership::factory()->create([
            'name_km' => 'ហេង សុភ័ក្រ',
            'name_en' => 'Heng Sophak',
            'position_en' => 'Vice Principal',
        ]);

        $results = Leadership::search('សុភា')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Sok Sophea', $results->first()->name_en);
    }

    /** @test */
    public function it_searches_by_english_position()
    {
        Leadership::factory()->position('Principal')->create([
            'name_en' => 'John Doe',
        ]);
        Leadership::factory()->position('Vice Principal')->create([
            'name_en' => 'Jane Smith',
        ]);

        $results = Leadership::search('Principal')->get();

        $this->assertCount(2, $results); // Both have 'Principal' in their position
    }

    /** @test */
    public function it_searches_by_bio_content()
    {
        Leadership::factory()->create([
            'name_en' => 'Sokha',
            'bio_en' => 'Has over 20 years of experience in education administration.',
        ]);

        $results = Leadership::search('education administration')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Sokha', $results->first()->name_en);
    }

    /** @test */
    public function it_returns_empty_for_non_matching_search()
    {
        Leadership::factory()->create(['name_en' => 'School Director']);

        $this->assertCount(0, Leadership::search('nonexistentkeyword')->get());
    }

    /** @test */
    public function it_orders_by_sort_order()
    {
        Leadership::factory()->create(['name_en' => 'Second', 'sort_order' => 2]);
        Leadership::factory()->create(['name_en' => 'First', 'sort_order' => 1]);
        Leadership::factory()->create(['name_en' => 'Third', 'sort_order' => 3]);

        $leaders = Leadership::orderBy('sort_order')->get();

        $this->assertEquals('First', $leaders[0]->name_en);
        $this->assertEquals('Second', $leaders[1]->name_en);
        $this->assertEquals('Third', $leaders[2]->name_en);
    }
}
