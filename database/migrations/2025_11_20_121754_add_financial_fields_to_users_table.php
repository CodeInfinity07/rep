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
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('credit_received', 20, 2)->default(0)->after('max_bet_bookmaker');
            $table->decimal('credit_remaining', 20, 2)->default(0)->after('credit_received');
            $table->decimal('balance', 20, 2)->default(0)->after('credit_remaining');
            $table->decimal('cash', 20, 2)->default(0)->after('balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['credit_received', 'credit_remaining', 'balance', 'cash']);
        });
    }
};
