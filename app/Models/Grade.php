<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'title',
        'grade_letter',
        'grade_point',
        'updated_by_user_id',
    ];


    public function scopeSearch($query, $value){
        $query->where('title','like',"%{$value}%");
    }

}
