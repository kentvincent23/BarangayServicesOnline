<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('barangay_residents', function (Blueprint $table) {
            // This keeps the column type but moves its position
            $table->string('middle_name')->nullable()->after('last_name')->change();
        });
    }

    public function down(): void
    {
        Schema::table('barangay_residents', function (Blueprint $table) {
            // This moves it back to where it was (after civil_status) if you rollback
            $table->string('middle_name')->nullable()->after('civil_status')->change();
        });
    }
};
