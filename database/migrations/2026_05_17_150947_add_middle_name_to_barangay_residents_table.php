<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barangay_residents', function (Blueprint $table) {
            // Adds the column cleanly right after the first name
            $table->string('middle_name')->nullable()->after('first_name');
        });
    }

    public function down(): void
    {
        Schema::table('barangay_residents', function (Blueprint $table) {
            $table->dropColumn('middle_name');
        });
    }
};
