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
        Schema::table('victims', function (Blueprint $table) {
            $table->boolean('has_profession')->default(false);
            $table->string('profession')->nullable();
            $table->string('education_level')->nullable();
            $table->string('contact')->change();
            $table->string('contact_alternative')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_person_relationship')->nullable();
            $table->string('contact_person_contact')->nullable();
            $table->boolean('has_children')->nullable();
            $table->integer('number_of_children')->nullable();
            $table->boolean('live_with_other_parents')->nullable();
            $table->json('parents_relationships')->nullable();
            $table->integer('relationship_duration')->nullable();
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('address')->nullable();
            $table->dropForeign('victims_neighborhood_id_foreign');
            $table->dropColumn('neighborhood_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('victims', function (Blueprint $table) {
            $table->foreignUlid('neighborhood_id')->nullable()->constrained('neighborhoods');
        });
    }
};
