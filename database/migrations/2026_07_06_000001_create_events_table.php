<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title_km');
            $table->string('title_en');
            $table->text('description_km');
            $table->text('description_en');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->string('location')->nullable();
            $table->string('cover_image')->nullable();
            $table->enum('status', ['draft', 'published', 'cancelled', 'completed'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->string('registration_link')->nullable();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();

            $table->index(['status', 'start_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
