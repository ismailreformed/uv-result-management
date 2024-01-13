<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'department_id',
        'name',
        'code',
        'credit_hours',
        'updated_by_user_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
