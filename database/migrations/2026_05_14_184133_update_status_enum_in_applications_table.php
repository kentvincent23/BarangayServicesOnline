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
        Schema::table('applications', function (Blueprint $table) {
            // We list ALL the options we want available now
            $table->enum('status', [
                'pending',
                'processing',
                'approved',
                'ready_to_pickup', // make sure this matches your exact old name
                'rejected',
                'released'
            ])->default('pending')->change();
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // This puts it back to the original list if you rollback
            $table->enum('status', ['approved', 'ready_to_pickup', 'rejected', 'released'])->change();
        });
    }
};
