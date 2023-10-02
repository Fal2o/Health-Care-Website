<?php



namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
use HasApiTokens;
use HasFactory;
use HasProfilePhoto;
use Notifiable;
use TwoFactorAuthenticatable;


public function diet_plans() {
return $this->hasMany(diet_plan::class);
}
public function bmis() {
return $this->hasMany(bmi::class);
}
public function sleeps() {
return $this->hasMany(sleep::class);
}
public function body_measurements() {
return $this->hasMany(body_measurement::class);
}
public function menstruations() {
return $this->hasMany(menstruation::class);
}
public function exerciserecords() {
return $this->hasMany(menstruation::class);
}




/**
* The attributes that are mass assignable.
*
* @var array<int, string>
*/
protected $fillable = [
'username',
'email',
'password',
"fname",
"lname",
"img_user",
"birth",
"gender",
"user_type",
];


/**
* The attributes that should be hidden for serialization.
*
* @var array<int, string>
*/
protected $hidden = [
'password',
'remember_token',
'two_factor_recovery_codes',
'two_factor_secret',
];


/**
* The attributes that should be cast.
*
* @var array<string, string>
*/
protected $casts = [
'email_verified_at' => 'datetime',
];


/**
* The accessors to append to the model's array form.
*
* @var array<int, string>
*/
protected $appends = [
'profile_photo_url',
];
}



