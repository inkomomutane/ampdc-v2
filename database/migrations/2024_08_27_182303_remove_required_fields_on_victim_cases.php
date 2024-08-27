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
        Schema::table('victim_cases', static function (Blueprint $table) {
            $table->dateTime('case_registered_at')->nullable()->change();
            $table->dropForeign('victim_cases_case_registered_by_organization_id_foreign');
            $table->foreignUlid('case_registered_by_organization_id')
                ->change()
                ->nullable()
                ->constrained('organizations')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('victim_cases', static function (Blueprint $table) {
            $table->dateTime('case_registered_at')->nullable(false)->change();
        });
    }
};
