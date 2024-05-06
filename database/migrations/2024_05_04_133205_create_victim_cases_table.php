<?php

use App\Enums\PeriodOfViolenceAct;
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
        Schema::create('victim_cases', static function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('case_code');

            $table->foreignUlid('victim_id')->constrained('victims');
            $table->foreignUlid('violence_type_id')->nullable()->constrained('violence_types');
            $table->foreignUlid('perpetrator_id')->nullable()->constrained('perpetrators');
            $table->enum('period_of_violence_act',PeriodOfViolenceAct::getValues())->nullable();
            $table->foreignUlid('violence_incident_location_id')->nullable()->constrained('violence_incident_locations');
            $table->foreignUlid('supposed_reason_of_violence_id')->nullable()->constrained('supposed_reason_of_violences');
            $table->text('violence_details')->nullable();
            $table->boolean('is_violence_caused_death')->default(false);

            $table->enum('progress_status', App\Enums\CaseProgressStatus::getValues());
            $table->json('updated_fields')->nullable();

            $table->foreignUlid('organization_id')->nullable()->constrained('organizations');
            $table->foreignUlid('forwarded_to_organization_id')->nullable()->constrained('organizations');
            $table->foreignUlid('forwarded_from_organization_id')->nullable()->constrained('organizations');

            $table->boolean('is_terminated')->default(false);
            $table->text('conclusion')->nullable();

            $table->foreignUlid('case_registered_by_id')->constrained('users');
            $table->foreignUlid('case_updated_by_id')->nullable()->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victim_cases_histories');
    }
};
