<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;

class foodController extends Controller
{
    public function index(){
        $foods = food::all();
        return view('food.food',compact('foods'));
    }

    public function select_food($id){
        
        $food_select = food::find($id);
        $new_food_select = new food_select();
        

        return redirect('/food')->with('success','Food Has Been Added!');
    }
}
