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
            $table->decimal('max_bet_soccer', 15, 2)->nullable()->after('notes');
            $table->decimal('max_bet_tennis', 15, 2)->nullable()->after('max_bet_soccer');
            $table->decimal('max_bet_cricket', 15, 2)->nullable()->after('max_bet_tennis');
            $table->decimal('max_bet_fancy', 15, 2)->nullable()->after('max_bet_cricket');
            $table->decimal('max_bet_race', 15, 2)->nullable()->after('max_bet_fancy');
            $table->decimal('max_bet_casino', 15, 2)->nullable()->after('max_bet_race');
            $table->decimal('max_bet_greyhound', 15, 2)->nullable()->after('max_bet_casino');
            $table->decimal('max_bet_bookmaker', 15, 2)->nullable()->after('max_bet_greyhound');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'max_bet_soccer',
                'max_bet_tennis',
                'max_bet_cricket',
                'max_bet_fancy',
                'max_bet_race',
                'max_bet_casino',
                'max_bet_greyhound',
                'max_bet_bookmaker',
            ]);
        });
    }
};
