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
        Schema::table('business_ideas', function (Blueprint $table) {
            $table->enum('tier', ['free', 'pro', 'premium'])->default('free')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_ideas', function (Blueprint $table) {
            $table->dropColumn('tier');
        });
    }
};
