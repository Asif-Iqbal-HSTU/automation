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
        Schema::create('course_distributions', function (Blueprint $table) {
            $table->id();
            $table->string('degree');
            $table->string('code')->nullable();
            $table->string('academicYear');
            $table->string('session');
            $table->string('level');
            $table->string('semester');
            $table->string('section');
            $table->string('teacher');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_distributions');
    }
};
