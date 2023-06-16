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
        Schema::create('teacher_remarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("assignment_resolver_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->text("remark");
            $table->float("note");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_remarks');
    }
};
