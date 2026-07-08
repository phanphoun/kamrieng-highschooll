<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('school_name_en');
            $table->string('school_name_kh')->nullable();
            $table->string('school_code', 20)->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_kh')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();
            $table->string('academic_year', 20)->nullable();
            $table->string('principal_name')->nullable();
            $table->string('vice_principal_name')->nullable();
            $table->year('established_year')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->text('map_embed_url')->nullable();
            $table->text('about_description_en')->nullable();
            $table->text('about_description_kh')->nullable();
            $table->text('mission_en')->nullable();
            $table->text('mission_kh')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('vision_kh')->nullable();
            $table->text('motto_en')->nullable();
            $table->text('motto_kh')->nullable();
            $table->string('opening_hours')->nullable();
            $table->string('office_hours')->nullable();
            $table->boolean('is_maintenance_mode')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
