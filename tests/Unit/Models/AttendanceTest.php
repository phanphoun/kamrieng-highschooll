<?php

namespace Tests\Unit\Models;

use App\Models\Attendance;
use App\Models\User;
use App\Models\SchoolClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create shared user and class for attendance records
        $this->student = User::factory()->create();
        $this->class = SchoolClass::factory()->create();
        $this->markedBy = User::factory()->create();
    }

    /** @test */
    public function it_filters_present_attendance()
    {
        Attendance::factory()->present()->create([
            'student_id' => $this->student->id,
            'class_id' => $this->class->id,
            'marked_by_id' => $this->markedBy->id,
        ]);
        Attendance::factory()->absent()->create([
            'student_id' => $this->student->id,
            'class_id' => $this->class->id,
            'marked_by_id' => $this->markedBy->id,
        ]);

        $presentRecords = Attendance::present()->get();

        $this->assertCount(1, $presentRecords);
        $this->assertEquals('present', $presentRecords->first()->status);
    }

    /** @test */
    public function it_filters_absent_attendance()
    {
        Attendance::factory()->absent()->create([
            'student_id' => $this->student->id,
            'class_id' => $this->class->id,
            'marked_by_id' => $this->markedBy->id,
        ]);
        Attendance::factory()->present()->create([
            'student_id' => $this->student->id,
            'class_id' => $this->class->id,
            'marked_by_id' => $this->markedBy->id,
        ]);

        $absentRecords = Attendance::absent()->get();

        $this->assertCount(1, $absentRecords);
        $this->assertEquals('absent', $absentRecords->first()->status);
    }

    /** @test */
    public function it_filters_late_attendance()
    {
        Attendance::factory()->late()->create([
            'student_id' => $this->student->id,
            'class_id' => $this->class->id,
            'marked_by_id' => $this->markedBy->id,
        ]);

        $lateRecords = Attendance::late()->get();

        $this->assertCount(1, $lateRecords);
        $this->assertEquals('late', $lateRecords->first()->status);
    }

    /** @test */
    public function it_filters_excused_attendance()
    {
        Attendance::factory()->excused()->create([
            'student_id' => $this->student->id,
            'class_id' => $this->class->id,
            'marked_by_id' => $this->markedBy->id,
        ]);

        $excusedRecords = Attendance::excused()->get();

        $this->assertCount(1, $excusedRecords);
        $this->assertEquals('excused', $excusedRecords->first()->status);
    }

    /** @test */
    public function it_returns_distinct_attendance_statuses()
    {
        // Create attendance records with each status
        foreach (['present', 'absent', 'late', 'excused'] as $status) {
            Attendance::factory()->create([
                'student_id' => $this->student->id,
                'class_id' => $this->class->id,
                'marked_by_id' => $this->markedBy->id,
                'status' => $status,
            ]);
        }

        $this->assertCount(4, Attendance::all());
        $this->assertCount(1, Attendance::present()->get());
        $this->assertCount(1, Attendance::absent()->get());
        $this->assertCount(1, Attendance::late()->get());
        $this->assertCount(1, Attendance::excused()->get());
    }

    /** @test */
    public function it_has_student_relationship()
    {
        $attendance = Attendance::factory()->create([
            'student_id' => $this->student->id,
            'class_id' => $this->class->id,
            'marked_by_id' => $this->markedBy->id,
        ]);

        $this->assertInstanceOf(User::class, $attendance->student);
        $this->assertTrue($attendance->student->is($this->student));
    }

    /** @test */
    public function it_has_class_relationship()
    {
        $attendance = Attendance::factory()->create([
            'student_id' => $this->student->id,
            'class_id' => $this->class->id,
            'marked_by_id' => $this->markedBy->id,
        ]);

        $this->assertInstanceOf(SchoolClass::class, $attendance->schoolClass);
        $this->assertTrue($attendance->schoolClass->is($this->class));
    }
}
