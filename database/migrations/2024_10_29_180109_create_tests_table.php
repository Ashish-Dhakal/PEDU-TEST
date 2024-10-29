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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('test_name', 100); // VARCHAR(100) NOT NULL
            $table->enum('test_type', ['main', 'subject', 'chapter'])->default('main'); // ENUM for test_type
            $table->unsignedBigInteger('subject_id')->nullable(); // Foreign key, nullable
            $table->timestamps(); // This adds 'created_at' and 'updated_at' columns

            // Foreign key constraint
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
