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
        Schema::create('course_curriculums', function (Blueprint $table) {
            $table->id();
            $table->string('distributionID')->nullable();
            $table->string('code')->nullable();
            $table->string('prerequisite')->nullable();
            $table->string('textbook');
            $table->string('syllabus');
            $table->string('assignments');
            $table->string('tests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_curriculums');
    }
};
