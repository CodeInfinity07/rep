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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->enum('type', ['owner', 'admin', 'supermaster', 'master', 'bettor']);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->decimal('downline_share', 5, 2)->nullable()->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('phone', 20)->nullable();
            $table->string('reference')->nullable();
            $table->text('notes')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
