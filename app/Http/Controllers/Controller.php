<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\body_measurement;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function bmiPage(){
        return view('/bmi');
    }

    public function sleepPage(){
        return view('/sleep');
    }

    public function exercisePage(){
        return view('/exercise');
    }

    public function foodPage(){
        return view('/food');
    }

    public function bodyPage(){
        return view('/body');
    }

    public function menstruationPage(){
        return view('/menstruation');
    }

    public function index(){
        $user_type = Auth::user()->user_type;
        $allUsers = User::all() ?? []; // All users (ensuring it's an array)
        $usersAdmin = User::where('user_type', 'admin')->get() ?? []; // Admin users
        $usersRegular = User::where('user_type', 'user')->get() ?? []; // Regular users 
        return view('Dashboard',[
            'allUsers' => $allUsers,
            'usersAdmin' => $usersAdmin,
            'usersRegular' => $usersRegular,
            'user_type' => $user_type
        ]);
    }

    public function showBodyDatatest(){
        $user = Auth::user();
        $bodyData = body_measurement::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();


        foreach ($bodyData as $record) {
            $record = $record->created_at->format('d F Y');;
        }


        return view('body.bodydata', ['bodyData' => $bodyData]);
    }
}
