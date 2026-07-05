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
            $table->string('title_km');
            $table->string('title_en');
            $table->enum('type', ['student', 'teacher', 'school']);
            $table->string('award_level')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->date('awarded_on')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();

            $table->index(['type', 'is_featured']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
