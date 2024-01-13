<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'name',
        'year',
        'start_date',
        'end_date',
        'updated_by_user_id',
    ];
}
