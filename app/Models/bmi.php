<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class bmi extends Model
{
use HasFactory;
use SoftDeletes;
public function user() {
return $this->belongsTo(User::class);
}


public function bmi_recommends() {
return $this->hasMany(bmi_recommend::class);
}


}



