<?php

namespace Tests\Unit\Models;

use App\Models\Assignment;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssignmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_filters_published_assignments()
    {
        Assignment::factory()->published()->create();
        Assignment::factory()->draft()->create();

        $published = Assignment::where('status', 'published')->get();

        $this->assertCount(1, $published);
        $this->assertEquals('published', $published->first()->status);
    }

    /** @test */
    public function it_excludes_unpublished_assignments()
    {
        Assignment::factory()->draft()->create();
        Assignment::factory()->draft()->create();

        $this->assertCount(0, Assignment::where('status', 'published')->get());
    }

    /** @test */
    public function it_filters_due_soon_assignments()
    {
        Assignment::factory()->create([
            'due_date' => now()->addDay(),
            'title' => 'Due Tomorrow',
        ]);
        Assignment::factory()->create([
            'due_date' => now()->addDays(10),
            'title' => 'Due Later',
        ]);

        $dueSoon = Assignment::whereBetween('due_date', [now(), now()->addDays(3)])->get();

        $this->assertCount(1, $dueSoon);
        $this->assertEquals('Due Tomorrow', $dueSoon->first()->title);
    }

    /** @test */
    public function it_filters_overdue_assignments()
    {
        Assignment::factory()->create([
            'due_date' => now()->subDay(),
            'title' => 'Overdue Assignment',
        ]);
        Assignment::factory()->create([
            'due_date' => now()->addDay(),
            'title' => 'Not Yet Due',
        ]);

        $overdue = Assignment::where('due_date', '<', now())->get();

        $this->assertCount(1, $overdue);
        $this->assertEquals('Overdue Assignment', $overdue->first()->title);
    }

    /** @test */
    public function it_checks_if_assignment_is_overdue()
    {
        $overdueAssignment = Assignment::factory()->create([
            'due_date' => now()->subDay(),
        ]);
        $futureAssignment = Assignment::factory()->create([
            'due_date' => now()->addDay(),
        ]);

        $this->assertTrue($overdueAssignment->due_date->isPast());
        $this->assertFalse($futureAssignment->due_date->isPast());
    }

    /** @test */
    public function it_has_teacher_relationship()
    {
        $teacher = User::factory()->create();
        $assignment = Assignment::factory()->create(['teacher_id' => $teacher->id]);

        $this->assertInstanceOf(User::class, $assignment->teacher);
        $this->assertTrue($assignment->teacher->is($teacher));
    }

    /** @test */
    public function it_has_subject_relationship()
    {
        $subject = Subject::factory()->create();
        $assignment = Assignment::factory()->create(['subject_id' => $subject->id]);

        $this->assertInstanceOf(Subject::class, $assignment->subject);
        $this->assertTrue($assignment->subject->is($subject));
    }

    /** @test */
    public function it_has_school_class_relationship()
    {
        $class = SchoolClass::factory()->create();
        $assignment = Assignment::factory()->create(['class_id' => $class->id]);

        $this->assertInstanceOf(SchoolClass::class, $assignment->schoolClass);
        $this->assertTrue($assignment->schoolClass->is($class));
    }
}
