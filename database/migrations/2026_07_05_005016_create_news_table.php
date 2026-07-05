<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('news_categories')->nullOnDelete();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->string('title_km');
            $table->string('title_en');
            $table->string('slug')->unique();
            $table->text('body_km');
            $table->text('body_en');
            $table->string('cover_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('meta_title_km')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_description_km')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->enum('status', ['draft', 'published', 'scheduled', 'archived'])->default('draft');
            $table->dateTime('published_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
