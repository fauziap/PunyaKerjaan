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
        Schema::create('project_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projetc_id')->references('id')->on('projects')->constrained()->onDelete('cascade');
            $table->foreignId('freelancer_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->text('message');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();

            // referensi
            // $table->foreignId('freelancer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_applications');
    }
};
