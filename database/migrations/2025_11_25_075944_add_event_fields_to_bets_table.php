<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bets', function (Blueprint $table) {
            $table->string('event_id')->nullable()->after('market_id');
            $table->string('event_name')->nullable()->after('event_id');
            $table->string('selection_id')->nullable()->after('selection_name');
            $table->string('sport_type')->default('cricket')->after('selection_id');
        });
    }

    public function down(): void
    {
        Schema::table('bets', function (Blueprint $table) {
            $table->dropColumn(['event_id', 'event_name', 'selection_id', 'sport_type']);
        });
    }
};
