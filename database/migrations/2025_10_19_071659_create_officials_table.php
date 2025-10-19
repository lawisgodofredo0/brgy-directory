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
            Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');           // First name
            $table->string('last_name');            // Last name
            $table->string('position');             // e.g., Barangay Captain, Kagawad
            $table->string('phone')->nullable();    // Contact phone
            $table->string('email')->nullable();    // Contact email
            $table->text('responsibilities')->nullable(); // Description of duties
            $table->string('photo')->nullable();    // Path to uploaded photo (storage)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officials');
    }
};
