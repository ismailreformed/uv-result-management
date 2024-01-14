<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'department_id',
        'name',
        'roll',
        'father_name',
        'mother_name',
        'dob',
        'session',
        'updated_by_user_id',
    ];

    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%")->orWhere('roll','like',"%{$value}%");
    }


    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function subjects()
    {
        return $this->hasMany(StudentSubject::class, 'student_id', 'id');
    }
}
