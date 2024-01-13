<?php

namespace App\Models;

use App\Models\Traits\CommonModelFeatures;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use CommonModelFeatures;

    protected $fillable = [
        'created_by_user_id',
        'name',
        'duration_in_month',
        'updated_by_user_id',
    ];
}
