<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            // 1. Drop the old column only if it is still there
            if (Schema::hasColumn('applications', 'document_type')) {
                $table->dropColumn('document_type');
            }

            // 2. Add the new ID column only if it hasn't been added yet
            if (!Schema::hasColumn('applications', 'service_type_id')) {
                $table->foreignId('service_type_id')
                    ->after('resident_id')
                    ->nullable() // Keep it nullable so existing rows don't break
                    ->constrained('service_types')
                    ->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        // This defines what happens if you rollback THIS specific fix
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('document_type');
            $table->foreignId('service_type_id')->after('resident_id')->constrained('service_types');
        });
    }
};
