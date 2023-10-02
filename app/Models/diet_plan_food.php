<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class diet_plan_food extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function diet_plan() {
        return $this->belongsTo(diet_plan::class);
    }
    public function food() {
        return $this->belongsTo(food::class);
    }
}





