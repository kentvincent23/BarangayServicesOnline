<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('barangay_residents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('last_name');
            $table->unsignedTinyInteger('age');
            $table->date('birthdate');
            $table->enum('civil_status', ['single', 'married', 'widowed', 'separated', 'annulled']);
            $table->string('resident_id')->unique();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('barangay_residents');
    }
};