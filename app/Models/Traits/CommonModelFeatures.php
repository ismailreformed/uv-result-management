<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

trait CommonModelFeatures
{
    use SoftDeletes, HasFactory, CommonModelHelperFeatures;
}
