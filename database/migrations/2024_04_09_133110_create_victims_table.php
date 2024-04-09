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
        Schema::create('victims', static function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->foreignUlid('neighborhood_id')->nullable()->constrained('neighborhoods');
            $table->foreignUlid('violence_type_id')->nullable()->constrained('violence_types');
            $table->text('violence_details')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victims');
    }
};
