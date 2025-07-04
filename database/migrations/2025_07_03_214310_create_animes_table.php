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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mal_id')->unique();
            $table->string('title');
            $table->text('synopsis')->nullable();
            $table->string('image_url')->nullable();
            $table->decimal('score', 3, 2)->nullable();
            $table->string('status')->nullable();
            $table->integer('episodes')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
        });

        Schema::create('anime_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('mal_id');
            $table->timestamps();
            
            // Ensure one save per user per anime
            $table->unique(['user_id', 'mal_id']);
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('mal_id');
            $table->text('review')->nullable();
            $table->integer('rating')->nullable(); // 1-10 rating
            $table->timestamps();
            
            // Ensure one review per user per anime
            $table->unique(['user_id', 'mal_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('anime_user');
        Schema::dropIfExists('animes');
    }
};
