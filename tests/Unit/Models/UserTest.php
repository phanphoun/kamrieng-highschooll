<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_if_user_is_admin()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $teacher = User::factory()->create(['role' => 'teacher']);

        $this->assertTrue($admin->isAdmin());
        $this->assertFalse($teacher->isAdmin());
    }

    /** @test */
    public function it_checks_if_user_is_teacher()
    {
        $teacher = User::factory()->create(['role' => 'teacher']);
        $student = User::factory()->create(['role' => 'student']);

        $this->assertTrue($teacher->isTeacher());
        $this->assertFalse($student->isTeacher());
    }

    /** @test */
    public function it_checks_if_user_is_student()
    {
        $student = User::factory()->create(['role' => 'student']);
        $parent = User::factory()->create(['role' => 'parent']);

        $this->assertTrue($student->isStudent());
        $this->assertFalse($parent->isStudent());
    }

    /** @test */
    public function it_checks_if_user_is_parent()
    {
        $parent = User::factory()->create(['role' => 'parent']);
        $admin = User::factory()->create(['role' => 'admin']);

        $this->assertTrue($parent->isParent());
        $this->assertFalse($admin->isParent());
    }

    /** @test */
    public function it_checks_if_user_has_specific_role()
    {
        $user = User::factory()->create(['role' => 'teacher']);

        $this->assertTrue($user->hasRole('teacher'));
        $this->assertFalse($user->hasRole('admin'));
        $this->assertFalse($user->hasRole('student'));
    }

    /** @test */
    public function it_returns_role_string()
    {
        $user = User::factory()->create(['role' => 'student']);

        $this->assertEquals('student', $user->role);
    }
}
