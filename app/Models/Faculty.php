<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'name',
        'updated_by_user_id',
    ];

    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%");
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'faculty_id', 'id');
    }
}
