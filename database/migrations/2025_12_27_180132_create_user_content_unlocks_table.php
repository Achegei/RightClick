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
        Schema::create('user_content_unlocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('content_type', ['blog', 'program', 'business_idea']);
            $table->unsignedBigInteger('content_id');
            $table->timestamp('unlocked_at')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'content_type', 'content_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_content_unlocks');
    }
};
