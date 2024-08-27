<?php

use App\Enums\CaseProgressStatus;
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
        Schema::create('forwarding_cases', static function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('case_id')->constrained('victim_cases')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUlid('organization_id')->constrained('organizations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('case_details');
            $table->enum('status', CaseProgressStatus::getValues())->default(CaseProgressStatus::IN_PROGRESS);
            $table->foreignUlid('forwarded_to')->nullable()->constrained('organizations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('conclusion');
            $table->json('case_updates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forwarding_case_progress');
    }
};
