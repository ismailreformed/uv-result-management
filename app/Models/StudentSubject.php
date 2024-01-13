<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'student_id',
        'semester_id',
        'subject_id',
        'enrollment_date',
        'status',
        'updated_by_user_id',
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'student_id', 'id');
    }

    public function semester()
    {
        return $this->hasOne(Semester::class, 'semester_id', 'id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'subject_id', 'id');
    }
}
