<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('school_classes')->cascadeOnDelete();
            $table->string('academic_year');
            $table->date('enrollment_date')->nullable();
            $table->enum('status', ['active', 'completed', 'dropped'])->default('active');
            $table->timestamps();

            $table->unique(['student_id', 'class_id', 'academic_year']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
