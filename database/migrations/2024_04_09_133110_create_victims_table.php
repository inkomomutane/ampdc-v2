<?php

use App\Enums\CivilState;
use App\Enums\Gender;
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
            $table->enum('gender', Gender::getValues())->default(Gender::FEMALE);
            $table->enum('civil_state', CivilState::getValues())->default(CivilState::SINGLE);
            $table->foreignUlid('neighborhood_id')->nullable()->constrained('neighborhoods');
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
