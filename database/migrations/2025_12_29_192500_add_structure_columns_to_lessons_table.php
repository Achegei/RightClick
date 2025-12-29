<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lessons', function (Blueprint $table) {

            // Phase grouping (Discovery, Skill Building, Client Acquisition, etc.)
            $table->string('phase', 100)->nullable()->after('tier');

            // Lesson intent / nature
            $table->enum('lesson_type', [
                'mindset',
                'strategy',
                'skill',
                'execution',
                'system',
            ])->default('skill')->after('phase');

            // Clear action per lesson (refund + execution logic)
            $table->text('action_step')->nullable()->after('content');

            // Psychological reinforcement
            $table->string('outcome', 255)->nullable()->after('action_step');

            // Content control
            $table->enum('status', ['draft', 'published'])
                  ->default('draft')
                  ->after('order');
        });
    }

    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn([
                'phase',
                'lesson_type',
                'action_step',
                'outcome',
                'status',
            ]);
        });
    }
};
