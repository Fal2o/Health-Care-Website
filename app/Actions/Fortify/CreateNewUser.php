<?php



namespace App\Actions\Fortify;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


class CreateNewUser implements CreatesNewUsers
{
use PasswordValidationRules;


/**
* Validate and create a newly registered user.
*
* @param array<string, string> $input
*/
public function create(array $input): User
{
Validator::make($input, [
'username' => ['required', 'string', 'max:255'],
'fname' => ['required', 'string', 'max:255'],
'lname' => ['required', 'string', 'max:255'],
'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
'password' => $this->passwordRules(),
'gender' => ['required', 'string'],
'birth' => ['required', 'date'],
'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
])->validate();


return User::create([
'username' => $input['username'],
'fname' => $input['fname'],
'lname' => $input['lname'],
'email' => $input['email'],
'password' => Hash::make($input['password']),
'gender' => $input['gender'],
'birth' => $input['birth'],
]);
}
}



