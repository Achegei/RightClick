<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('series')->nullable()->after('tier')->comment('Group blogs into series');
            $table->integer('series_order')->default(0)->after('series')->comment('Order within the series');
            $table->boolean('featured')->default(false)->after('series_order')->comment('Highlight important posts');
            $table->string('cta_text')->nullable()->after('featured')->comment('Call-to-action text');
            $table->string('cta_link')->nullable()->after('cta_text')->comment('Call-to-action link');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['series', 'series_order', 'featured', 'cta_text', 'cta_link']);
        });
    }
};
