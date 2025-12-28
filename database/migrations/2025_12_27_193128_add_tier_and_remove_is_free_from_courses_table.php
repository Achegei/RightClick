<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'tier')) {
                $table->string('tier')->default('free')->after('description');
            }

            if (Schema::hasColumn('courses', 'is_free')) {
                $table->dropColumn('is_free');
            }
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'is_free')) {
                $table->boolean('is_free')->default(true)->after('description');
            }

            if (Schema::hasColumn('courses', 'tier')) {
                $table->dropColumn('tier');
            }
        });
    }
};
