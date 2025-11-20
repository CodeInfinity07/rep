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
            $table->decimal('commission', 5, 2)->default(2.00)->after('downline_share');
            $table->boolean('can_bet')->default(true)->after('commission');
            $table->boolean('can_settle_pl')->default(false)->after('can_bet');
            $table->string('currency', 10)->default('Rs.')->after('can_settle_pl');
            $table->text('notes')->nullable()->after('reference');
            
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
                'commission',
                'can_bet',
                'can_settle_pl',
                'currency',
                'notes',
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
