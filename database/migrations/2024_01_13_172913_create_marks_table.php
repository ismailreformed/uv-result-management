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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by_user_id')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->string('number')->nullable();
            $table->integer('credit_earned')->nullable();
            $table->float('gp_earned')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('updated_by_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
