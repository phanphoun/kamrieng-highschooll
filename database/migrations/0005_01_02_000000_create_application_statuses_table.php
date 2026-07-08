<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('application_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_kh')->nullable();
            $table->string('color', 20)->default('#6b7280');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        // Add foreign key from enrollment_applications to application_statuses
        Schema::table('enrollment_applications', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('application_statuses')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('enrollment_applications', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
        });

        Schema::dropIfExists('application_statuses');
    }
};
