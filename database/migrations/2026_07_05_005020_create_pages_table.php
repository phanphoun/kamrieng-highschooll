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
            $table->string('key')->unique();
            $table->string('title_km');
            $table->string('title_en');
            $table->text('body_km');
            $table->text('body_en');
            $table->string('meta_title_km')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_description_km')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
