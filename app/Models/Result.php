<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'student_id',
        'exam_id',
        'subject_id',
        'grade',
        'credit_earned',
        'gp_earned',
        'gpa',
        'remarks',
        'updated_by_user_id',
    ];
}
