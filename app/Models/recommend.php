<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class recommend extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function recommend_type() {
        return $this->belongsTo(recommend_type::class,'');
    }
    public function bmi_recommends() {
        return $this->hasMany(bmi_recommend::class);
    }

}



