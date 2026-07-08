<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_kh')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_kh')->nullable();
            $table->string('category', 50)->nullable();
            $table->string('achieved_by')->nullable();
            $table->date('achieved_date')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
