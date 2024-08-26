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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail');
            $table->text('about');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('budget');
            $table->unsignedBigInteger('client_id');
            $table->string('skill_level');
            $table->boolean('has_finished');
            $table->boolean('has_starter');
            $table->softDeletes();
            $table->timestamps();

            // reference client id di bawah
            // $table->foreignId('client_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
