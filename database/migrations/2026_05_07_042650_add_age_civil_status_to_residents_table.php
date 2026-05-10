<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barangay_residents', function (Blueprint $table) {
            $table->integer('age')->nullable()->after('last_name');
            $table->integer('birthdate')->nullable()->after('age');
            $table->string('civil_status')->nullable()->after('birthdate');
        });
    }

    public function down(): void
    {
        Schema::table('barangay_residents', function (Blueprint $table) {
            $table->dropColumn(['age', 'birthdate', 'civil_status']);
        });
    }
};
