<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistic_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statistic_id')->constrained()->cascadeOnDelete();
            $table->decimal('value', 10, 2);
            $table->string('academic_year');
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('changed_at')->useCurrent();

            $table->index(['statistic_id', 'changed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistic_history');
    }
};
