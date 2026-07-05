<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->text('submission_text')->nullable();
            $table->string('submission_file')->nullable();
            $table->decimal('score', 5, 2)->nullable();
            $table->text('feedback')->nullable();
            $table->dateTime('submitted_at')->nullable();
            $table->enum('status', ['draft', 'submitted', 'graded'])->default('draft');
            $table->timestamps();

            $table->unique(['assignment_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
