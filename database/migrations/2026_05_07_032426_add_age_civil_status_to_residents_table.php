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
    Schema::table('residents', function (Blueprint $table) {
        $table->integer('age')->nullable()->after('last_name');
        $table->string('civil_status')->nullable()->after('age');
    });
}

public function down(): void
    {
    Schema::table('residents', function (Blueprint $table) {
        $table->dropColumn(['age', 'civil_status']);
    });
}
};