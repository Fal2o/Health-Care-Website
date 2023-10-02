<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class diet_plan extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function diet_plan_foods() {
        return $this->hasMany(diet_plan_food::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function diet_details() {
        return $this->hasMany(diet_detail::class);
    }
}





