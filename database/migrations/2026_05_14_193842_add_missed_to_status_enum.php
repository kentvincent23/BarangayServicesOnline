<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->enum('status', [
                'pending',
                'processing',
                'approved',
                'rejected',
                'ready_to_pickup',
                'released',
                'missed' // Adding the missing piece!
            ])->default('pending')->change();
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // Rollback to previous list if needed
            $table->enum('status', ['pending', 'processing', 'approved', 'rejected', 'ready_to_pickup', 'released'])->change();
        });
    }
};
