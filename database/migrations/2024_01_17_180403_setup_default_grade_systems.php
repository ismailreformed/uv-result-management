<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('grades')->insert([
            ['id' => 1,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => 'Withdrawn', 'grade_letter' => 'W', 'grade_point' => null],
            ['id' => 2,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => 'Unsatisfactory', 'grade_letter' => 'U', 'grade_point' => null],
            ['id' => 3,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => 'Satisfactory', 'grade_letter' => 'S', 'grade_point' => null],
            ['id' => 4,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => 'Incomplete', 'grade_letter' => 'I', 'grade_point' => null],
            ['id' => 5,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => 'below 50%', 'grade_letter' => 'F', 'grade_point' => null],
            ['id' => 6,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '50% to below 55%', 'grade_letter' => 'D', 'grade_point' => 2.00],
            ['id' => 7,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '55% to below 60%', 'grade_letter' => 'C', 'grade_point' => 2.25],
            ['id' => 8,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '60% to below 65%', 'grade_letter' => 'C+', 'grade_point' => 2.50],
            ['id' => 9,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '65% to below 70%', 'grade_letter' => 'B-', 'grade_point' => 2.75],
            ['id' => 10,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '70% to below 75%', 'grade_letter' => 'B', 'grade_point' => 3.00],
            ['id' => 11,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '75% to below 80%', 'grade_letter' => 'B+', 'grade_point' => 3.25],
            ['id' => 12,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '80% to below 85%', 'grade_letter' => 'A-', 'grade_point' => 3.50],
            ['id' => 13,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '85% to below 90%', 'grade_letter' => 'A', 'grade_point' => 3.75],
            ['id' => 14,'created_by_user_id' => 1, 'created_at' => Carbon::now(), 'title' => '90% and above', 'grade_letter' => 'A+', 'grade_point' => 4.00],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
