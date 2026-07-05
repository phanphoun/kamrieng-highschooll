<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('mediable_type');
            $table->unsignedBigInteger('mediable_id');
            $table->enum('type', ['image', 'video', 'document'])->default('image');
            $table->string('file_path');
            $table->string('caption')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['mediable_type', 'mediable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
