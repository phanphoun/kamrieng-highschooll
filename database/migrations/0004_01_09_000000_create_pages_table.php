<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_kh')->nullable();
            $table->string('slug')->unique();
            $table->longText('content_en')->nullable();
            $table->longText('content_kh')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_kh')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('show_in_menu')->default(false);
            $table->integer('sort_order')->default(0);
            $table->string('template', 50)->default('default');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
