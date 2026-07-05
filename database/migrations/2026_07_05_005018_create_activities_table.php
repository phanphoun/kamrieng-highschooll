<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('activity_categories')->nullOnDelete();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->string('title_km');
            $table->string('title_en');
            $table->text('description_km');
            $table->text('description_en');
            $table->date('activity_date')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamps();

            $table->index(['status', 'activity_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
