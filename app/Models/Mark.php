<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'student_id',
        'exam_id',
        'subject_id',
        'number',
        'grade',
        'credit_earned',
        'gp_earned',
        'remarks',
        'updated_by_user_id',
    ];
}
