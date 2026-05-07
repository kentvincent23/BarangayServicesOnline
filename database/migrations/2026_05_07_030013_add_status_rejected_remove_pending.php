<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE applications 
            MODIFY COLUMN status ENUM(
                'approved',
                'ready_to_pickup',
                'released',
                'rejected'
            ) NOT NULL DEFAULT 'approved'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE applications 
            MODIFY COLUMN status ENUM(
                'approved',
                'ready_to_pickup',
                'released'
            ) NOT NULL DEFAULT 'approved'
        ");
    }
};
