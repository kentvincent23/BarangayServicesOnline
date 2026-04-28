<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE applications MODIFY COLUMN status ENUM('pending', 'approved', 'ready_to_pickup', 'released') NOT NULL DEFAULT 'pending'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE applications MODIFY COLUMN status ENUM('pending', 'approved', 'ready_to_pickup') NOT NULL DEFAULT 'pending'");
    }
};
