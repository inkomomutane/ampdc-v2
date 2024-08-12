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
        Schema::table('victim_cases', function (Blueprint $table) {
            $table->foreignUlid('case_registered_by_organization_id')->constrained('organizations');
            $table->dateTime('case_registered_at');
            $table->string('case_registered_address')->nullable();
            $table->string('case_registered_agent')->nullable();
            $table->string('case_registered_city')->nullable();
            $table->string('case_registered_province')->nullable();
            $table->string('case_registered_district')->nullable();


            # violence case details

            $table->string('perpetrator_relationship')->nullable();
            $table->string('perpetrator_name')->nullable();
            $table->string('perpetrator_profession')->nullable();
            $table->boolean('live_with_perpetrator')->nullable();
            $table->string('perpetrator_address')->nullable();
            $table->string('perpetrator_contact')->nullable();
            $table->string('perpetrator_contact_alternative')->nullable();
            $table->boolean('is_violence_reported_to_authorities')->nullable();
            $table->boolean('is_the_first_time')->nullable();
            $table->text('last_violences_description')->nullable();

            $table->boolean('is_the_last_cases_reported_to_authorities')->nullable();
            $table->boolean('are_last_cases_resolved')->nullable();
            $table->text('last_cases_resolution_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('victim_cases', function (Blueprint $table) {
            //
        });
    }
};
