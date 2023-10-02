<?php


namespace App\Http\Controllers;


use App\Models\food;
use Illuminate\Http\Request;


use Exception;
use App\Models\diet_plan_food;
use App\Models\diet_plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class healthrecordController extends Controller
{
    function index(){
        $food = food::all();
        return view("healthrecord", compact('food'));
    }
    function board(){
        $plans = diet_plan::where("user_id", "=", Auth::user()->id)
                ->orderBy("date", "DESC")
                ->get();
        return view("healthrecordBoard", compact('plans'));
    }
    function updatePage($id){
        return view("healthrecordUpdate", ["plan"=>diet_plan_food::find($id), "food"=>food::all()]);
    }
    function update(Request $rq){
        $plan = diet_plan_food::find($rq->id);
        $plan->food_id = $rq->menu;
        $plan->save();
        return redirect('/healthrecord/board');
    }
    function delete($id){
        diet_plan_food::destroy($id);
        return redirect('/healthrecord/board');
    }
    function chart(){
        $plans = diet_plan::where("user_id", "=", Auth::user()->id)
                ->orderBy("date", "ASC")
                ->get();
        return view("healthrecordChart", compact('plans'));
    }
    function addFoodPlan(Request $req){
        try{
            $date = $req->date;
            $menuId = $req->menu;
            $diet_plans = Auth::user()->diet_plans;
            for ($i=0; $i < count($diet_plans); $i++) {
                if($diet_plans[$i]->date==$date){
                    $pid = $diet_plans[$i]->id;
                    DB::insert("INSERT INTO `diet_plan_foods`(`food_id`, `diet_plan_id`) VALUES ('$menuId', '$pid')");
                    return redirect('/healthrecord');
                }
            }
            $plan = new diet_plan();
            $plan->date = $date;
            $plan->user_id = Auth::user()->id;
            $plan->save();
            DB::insert("INSERT INTO `diet_plan_foods`(`food_id`, `diet_plan_id`) VALUES ('$menuId', '$plan->id')");
            return redirect('/healthrecord');
        }catch (Exception $e) {
            echo 'and the error is: ',  $e->getMessage(), "\n";
        }
    }
}



