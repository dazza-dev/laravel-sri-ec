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
        // Certificates
        Schema::create('sri_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('password');
            $table->date('expiration_date');
            $table->nullableMorphs('certificable');
            $table->timestamps();
            $table->softDeletes();
        });

        // Listings
        Schema::create('sri_listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('code');
            $table->string('description')->nullable();
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['code', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sri_certificates');
        Schema::dropIfExists('sri_listings');
    }
};
