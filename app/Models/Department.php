<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'faculty_id',
        'name',
        'updated_by_user_id',
    ];


    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%");
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'department_id', 'id');
    }
}
