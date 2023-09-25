<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
        
    }
}
