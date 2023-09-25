<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class food extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function diet_plans() {
        return $this->belongsToMany(diet_plan::class);
    }
}
