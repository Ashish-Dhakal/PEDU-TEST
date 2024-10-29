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
        Schema::create('user_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_test_id'); // Foreign key
            $table->unsignedBigInteger('question_id'); // Foreign key
            $table->unsignedBigInteger('selected_option_id')->nullable(); // Foreign key, nullable
            $table->time('time_taken')->nullable(); // TIME, nullable
            $table->boolean('is_correct')->nullable(); // BOOLEAN, nullable
            $table->boolean('is_attempted')->nullable(); // BOOLEAN, nullable
            $table->timestamps(); // This adds 'created_at' and 'updated_at' columns

            // Foreign key constraints
            $table->foreign('user_test_id')->references('id')->on('user_test_history')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('selected_option_id')->references('id')->on('options')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_test_questions');
    }
};
