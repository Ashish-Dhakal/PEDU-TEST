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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_text'); // TEXT NOT NULL
            // $table->unsignedBigInteger('correct_option_id')->nullable(); // Foreign key, nullable
            $table->unsignedBigInteger('subject_id')->nullable(); // Foreign key, nullable
            $table->unsignedBigInteger('chapter_id')->nullable(); // Foreign key, nullable
            $table->unsignedBigInteger('level_id')->nullable(); // Foreign key, nullable
            $table->timestamps(); // This adds 'created_at' and 'updated_at' columns

            // Foreign key constraints
            // $table->foreign('correct_option_id')->references('id')->on('options')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnDelete();
            $table->foreign('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->foreign('chapter_id')->references('id')->on('chapters')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
