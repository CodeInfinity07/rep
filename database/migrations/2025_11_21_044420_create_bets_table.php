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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('market_id');
            $table->string('market_name');
            $table->string('selection_name');
            $table->enum('bet_type', ['back', 'lay']);
            $table->decimal('odds', 10, 2);
            $table->decimal('stake', 15, 2);
            $table->decimal('liability', 15, 2);
            $table->decimal('profit', 15, 2);
            $table->enum('status', ['pending', 'matched', 'cancelled', 'settled'])->default('pending');
            $table->decimal('matched_amount', 15, 2)->default(0);
            $table->decimal('unmatched_amount', 15, 2)->default(0);
            $table->timestamp('placed_at')->useCurrent();
            $table->timestamp('matched_at')->nullable();
            $table->timestamp('settled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bets');
    }
};
