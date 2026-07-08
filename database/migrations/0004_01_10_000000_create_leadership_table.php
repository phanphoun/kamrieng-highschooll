<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leadership', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_kh')->nullable();
            $table->string('position_en');
            $table->string('position_kh')->nullable();
            $table->string('photo')->nullable();
            $table->text('bio_en')->nullable();
            $table->text('bio_kh')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leadership');
    }
};
