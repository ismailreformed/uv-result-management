<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'student_id',
        'semester_id',
        'exam_id',
        'subject_id',
        'number',
        'grade_id',
        'credit_earned',
        'gp_earned',
        'remarks',
        'updated_by_user_id',
    ];


    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function semester()
    {
        return $this->hasOne(Semester::class, 'id', 'semester_id');
    }

    public function exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }
}
