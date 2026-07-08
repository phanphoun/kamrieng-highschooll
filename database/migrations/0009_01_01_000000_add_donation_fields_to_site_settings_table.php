<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('donation_bank_name_en')->nullable()->after('is_maintenance_mode');
            $table->string('donation_bank_name_kh')->nullable()->after('donation_bank_name_en');
            $table->string('donation_account_name_en')->nullable()->after('donation_bank_name_kh');
            $table->string('donation_account_name_kh')->nullable()->after('donation_account_name_en');
            $table->string('donation_account_number')->nullable()->after('donation_account_name_kh');
            $table->string('donation_qr_code_path')->nullable()->after('donation_account_number');
            $table->text('donation_instructions_en')->nullable()->after('donation_qr_code_path');
            $table->text('donation_instructions_kh')->nullable()->after('donation_instructions_en');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'donation_bank_name_en',
                'donation_bank_name_kh',
                'donation_account_name_en',
                'donation_account_name_kh',
                'donation_account_number',
                'donation_qr_code_path',
                'donation_instructions_en',
                'donation_instructions_kh',
            ]);
        });
    }
};
