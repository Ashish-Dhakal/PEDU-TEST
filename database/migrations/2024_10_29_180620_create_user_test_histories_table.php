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
        Schema::create('user_test_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key, nullable
            $table->unsignedBigInteger('test_id')->nullable(); // Foreign key, nullable
            $table->decimal('score', 5, 2)->nullable(); // DECIMAL(5, 2), nullable
            $table->integer('total_questions')->nullable(); // INT, nullable
            $table->integer('correct_answers')->nullable(); // INT, nullable
            $table->integer('incorrect_answers')->nullable(); // INT, nullable
            $table->time('time_taken')->nullable(); // TIME, nullable
            $table->timestamps(); // This adds 'created_at' and 'updated_at' columns

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_test_histories');
    }
};
