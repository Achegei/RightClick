<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Rename table
        Schema::rename('success_stories', 'user_generated_business_ideas');

        // Add new columns
        Schema::table('user_generated_business_ideas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id'); // author/creator
            $table->enum('status', ['pending','approved','rejected','published'])
                  ->default('pending')
                  ->change(); // support moderation workflow
            $table->decimal('creator_share', 5, 2)->default(50)->after('tier'); // % revenue for creator
        });
    }

    public function down(): void
    {
        Schema::table('user_generated_business_ideas', function (Blueprint $table) {
            $table->enum('status', ['draft','published'])->default('draft')->change();
            $table->dropColumn(['user_id','creator_share']);
        });

        Schema::rename('user_generated_business_ideas', 'success_stories');
    }
};
