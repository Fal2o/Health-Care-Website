<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class diet_plan extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function food() {
        return $this->belongsToMany(food::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
