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
        Schema::create('victim_cases_histories', static function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('case_code');
            $table->foreignUlid('victim_id')->constrained('victims');
            $table->foreignUlid('case_registered_by_id')->constrained('users');
            $table->enum('progress_status', App\Enums\CaseProgressStatus::getValues());
            $table->text('case_details')->nullable();
            $table->text('progress_details')->nullable();
            $table->foreignUlid('case_updated_by_id')->nullable()->constrained('users');
            $table->json('case_modified_fields')->nullable();
            $table->foreignUlid('organization_id')->nullable()->constrained('organizations');
            $table->foreignUlid('violence_type_id')->nullable()->constrained('violence_types');
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
