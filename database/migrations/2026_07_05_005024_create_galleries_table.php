<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title_km');
            $table->string('title_en');
            $table->year('year')->nullable();
            $table->string('category')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();

            $table->index(['year', 'category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
