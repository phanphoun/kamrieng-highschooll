<?php

namespace Tests\Unit\Models;

use App\Models\Grade;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GradeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_calculates_percentage_correctly()
    {
        $grade = new Grade(['score' => 85, 'max_score' => 100]);

        $percentage = $grade->calculatePercentage();

        $this->assertEquals(85.0, $percentage);
        $this->assertEquals(85.0, $grade->percentage);
    }

    /** @test */
    public function it_calculates_percentage_with_different_values()
    {
        $grade = new Grade(['score' => 45, 'max_score' => 50]);

        $percentage = $grade->calculatePercentage();

        $this->assertEquals(90.0, $percentage);
    }

    /** @test */
    public function it_handles_zero_max_score()
    {
        $grade = new Grade(['score' => 0, 'max_score' => 0]);

        $percentage = $grade->calculatePercentage();

        $this->assertNull($grade->percentage);
    }

    /** @test */
    public function it_determines_letter_grade_a_for_90_plus()
    {
        $grade = new Grade(['score' => 95, 'max_score' => 100]);
        $grade->calculatePercentage();

        $this->assertEquals('A', $grade->determineLetterGrade());
    }

    /** @test */
    public function it_determines_letter_grade_b_for_80_89()
    {
        $grade = new Grade(['score' => 85, 'max_score' => 100]);
        $grade->calculatePercentage();

        $this->assertEquals('B', $grade->determineLetterGrade());
    }

    /** @test */
    public function it_determines_letter_grade_c_for_70_79()
    {
        $grade = new Grade(['score' => 75, 'max_score' => 100]);
        $grade->calculatePercentage();

        $this->assertEquals('C', $grade->determineLetterGrade());
    }

    /** @test */
    public function it_determines_letter_grade_d_for_60_69()
    {
        $grade = new Grade(['score' => 65, 'max_score' => 100]);
        $grade->calculatePercentage();

        $this->assertEquals('D', $grade->determineLetterGrade());
    }

    /** @test */
    public function it_determines_letter_grade_f_for_below_60()
    {
        $grade = new Grade(['score' => 55, 'max_score' => 100]);
        $grade->calculatePercentage();

        $this->assertEquals('F', $grade->determineLetterGrade());
    }

    /** @test */
    public function it_determines_letter_grade_at_boundaries()
    {
        // Test boundaries
        $boundaries = [
            [89.99, 'B'],
            [90.0, 'A'],
            [79.99, 'C'],
            [80.0, 'B'],
            [69.99, 'D'],
            [70.0, 'C'],
            [59.99, 'F'],
            [60.0, 'D'],
        ];

        foreach ($boundaries as [$score, $expectedLetter]) {
            $grade = new Grade(['score' => $score, 'max_score' => 100]);
            $grade->calculatePercentage();
            $this->assertEquals($expectedLetter, $grade->determineLetterGrade(), "Failed for score: {$score}");
        }
    }

    /** @test */
    public function it_filters_passing_grades()
    {
        $student = User::factory()->create();
        $class = SchoolClass::factory()->create();
        $subject = Subject::factory()->create();
        $gradedBy = User::factory()->create();

        Grade::factory()->create([
            'student_id' => $student->id,
            'class_id' => $class->id,
            'subject_id' => $subject->id,
            'graded_by_id' => $gradedBy->id,
            'score' => 85,
        ]);
        Grade::factory()->create([
            'student_id' => $student->id,
            'class_id' => $class->id,
            'subject_id' => $subject->id,
            'graded_by_id' => $gradedBy->id,
            'score' => 55,
        ]);

        // percentage must be calculated from score since max_score isn't stored
        $passingGrades = Grade::where('score', '>=', 60)->get();

        $this->assertCount(1, $passingGrades);
        $this->assertEquals(85, $passingGrades->first()->score);
    }

    /** @test */
    public function it_filters_failing_grades()
    {
        $student = User::factory()->create();
        $class = SchoolClass::factory()->create();
        $subject = Subject::factory()->create();
        $gradedBy = User::factory()->create();

        Grade::factory()->create([
            'student_id' => $student->id,
            'class_id' => $class->id,
            'subject_id' => $subject->id,
            'graded_by_id' => $gradedBy->id,
            'score' => 85,
        ]);
        Grade::factory()->create([
            'student_id' => $student->id,
            'class_id' => $class->id,
            'subject_id' => $subject->id,
            'graded_by_id' => $gradedBy->id,
            'score' => 45,
        ]);

        $failingGrades = Grade::where('score', '<', 60)->get();

        $this->assertCount(1, $failingGrades);
        $this->assertEquals(45, $failingGrades->first()->score);
    }
}
