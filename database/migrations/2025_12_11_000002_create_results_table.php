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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bet_id')->nullable()->constrained('bets')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('event_id');
            $table->string('event_name');
            $table->string('market_id');
            $table->string('market_name');
            $table->string('market_type');
            $table->string('selection_name')->nullable();
            $table->decimal('odds', 10, 2)->nullable();
            $table->decimal('stake', 15, 2)->nullable();
            $table->string('result')->nullable();
            $table->decimal('profit_loss', 15, 2)->nullable();
            $table->tinyInteger('settled')->default(0);
            $table->timestamp('placed_at')->useCurrent();
            $table->timestamp('settled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
