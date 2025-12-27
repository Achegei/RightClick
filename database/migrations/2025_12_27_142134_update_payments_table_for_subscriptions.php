<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            // Tier paid for
            $table->enum('tier', ['pro', 'premium'])
                  ->after('program_id');

            // Currency & provider
            $table->string('currency', 10)->default('KES')->after('amount');
            $table->string('payment_provider')->default('intasend')->after('currency');

            // Status refinement
            $table->enum('status', ['pending', 'paid', 'failed', 'refunded'])
                  ->change();

            // Timing
            $table->timestamp('paid_at')->nullable()->after('status');
            $table->timestamp('subscription_started_at')->nullable();
            $table->timestamp('subscription_expires_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn([
                'tier',
                'currency',
                'payment_provider',
                'paid_at',
                'subscription_started_at',
                'subscription_expires_at',
            ]);
        });
    }
};
