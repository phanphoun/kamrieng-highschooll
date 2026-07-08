<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollment_applications', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code', 20)->unique();
            $table->string('student_name_en');
            $table->string('student_name_kh')->nullable();
            $table->date('date_of_birth');
            $table->string('gender', 10);
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->text('address');
            $table->string('previous_school')->nullable();
            $table->string('grade_applying_for', 50);
            $table->string('academic_year', 20);
            $table->string('parent_name');
            $table->string('parent_phone', 20);
            $table->string('parent_email')->nullable();
            $table->string('parent_occupation')->nullable();
            $table->json('documents')->nullable();
            $table->text('additional_notes')->nullable();
            // FK added in a later migration to ensure table creation order
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollment_applications');
    }
};
