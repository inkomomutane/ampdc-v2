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
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('posted_on_facebook')->default(false);
            $table->boolean('posted_on_twitter')->default(false);
            $table->boolean('posted_on_linkedin')->default(false);
            $table->boolean('posted_on_instagram')->default(false);
            $table->boolean('posted_on_whatsapp')->default(false);
            $table->boolean('posted_on_youtube')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('posted_on_facebook');
        });
    }
};
