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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('address');
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->integer('land_area')->nullable();
            $table->string('type')->nullable();
            $table->integer('price')->nullable();
            $table->json('facilities')->nullable();
            $table->unsignedInteger('remaining_units')->nullable()->default(0);
            $table->string('status')->nullable()->default('available');
            $table->string('featured_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
