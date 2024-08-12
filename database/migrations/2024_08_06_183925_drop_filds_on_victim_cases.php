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
            $table->dropColumn('progress_status');
            $table->dropColumn('updated_fields');
            $table->dropForeign('victim_cases_organization_id_foreign');
            $table->dropColumn('organization_id');
            $table->dropForeign('victim_cases_forwarded_from_organization_id_foreign');
            $table->dropForeign('victim_cases_forwarded_to_organization_id_foreign');
            $table->dropForeign('victim_cases_case_updated_by_id_foreign');
            $table->dropColumn('forwarded_to_organization_id');
            $table->dropColumn('forwarded_from_organization_id');
            $table->dropColumn('case_updated_by_id');
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
