<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bmi_recommend extends Model
{
    use HasFactory;
    public function bmi() {
        return $this->belongsTo(bmi::class, "bmi_id");
    }
    public function recommend() {
        return $this->belongsTo(recommend::class, "recommend_id");
    }

}
