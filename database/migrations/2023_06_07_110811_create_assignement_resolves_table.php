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
        Schema::create('assignement_resolves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('assignement_id');
            $table->string('file_path')->nullable();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('assignement_id')->references('id')->on('assignements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignement_resolves');
    }
};
