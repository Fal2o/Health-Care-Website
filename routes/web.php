<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\bodymController;
use App\Http\Controllers\exerciseController;
use App\Http\Controllers\SleepController;
use App\Http\Controllers\MenstruationController;
use App\Http\Controllers\foodController;
use App\Http\Controllers\healthrecordController;



use Illuminate\Support\Facades\Route;
use App\Models\diet_plan;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('homepage');
});

//เส้นทางสำหรับ Admin



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

   
        // เส้นทางสำหรับผู้ใช้ทั่วไป
        Route::get('/dashboard', function () {
            $allUser = user::all();
            $users_admin = User::where('user_type', 'admin')->get();
            $users= User::where('user_type', '0')->get();
            return view('dashboard',compact('users_admin','allUser','users'));
        })->name('dashboard');
           
        // Route::get('/dashboard',[Controller::class,'index'])->name('dashboard');

        
    Route::middleware(['admin'])->group(function () {
        // Homepage addmin
        Route::get('/admin',[adminController::class,'index'])->name('adminPage');
        
        // CRUD
        Route::get('/admin/edit/{id}',[adminController::class,'edit']);
        Route::post('/admin/edit_update/{id}',[adminController::class,'edit_update']);
        Route::get('/admin/delete/{id}',[adminController::class,'delete']);
        Route::get('/admin/detial/{id}',[adminController::class,'detial']);
        Route::post('/admin/detial/update_datil/{id}',[adminController::class,'update_datil']);
        Route::get('/admin/history',[adminController::class,'history']);
        Route::get('/admin/restore/{id}',[adminController::class,'restore']);
        Route::get('/admin/forcedelete/{id}',[adminController::class,'forcedelete']);
        //Activity
        Route::get('/admin/activity',[adminController::class,'activity']);
        //เพิ่มลบอัพเดตอาหาร
        Route::get('/admin/activity/food',[adminController::class,'foodtable']);
        Route::get('/admin/activity/addfood',[adminController::class,'addfood']);
        Route::get('/admin/activity/food_edit/{id}',[adminController::class,'editfood']);
        Route::get('/admin/activity/food_delete/{id}',[adminController::class,'food_delete']);
        Route::get('/admin/activity/show_foodtable',[adminController::class,'show_foodtable'])->name('show_foodtable');
        Route::post('/admin/activity/save_addfood',[adminController::class,'save_foodtable']);
        Route::post('/admin/activity/edit/update_addfood/{id}',[adminController::class,'update_food']);
        Route::get('/admin/activity/recommandations',[adminController::class,'recommandations']);

        //ออกกำลังกาย
        Route::get('/admin/activity/addexercise',[adminController::class,'addexercise']);
        Route::get('/admin/activity/show_exercisetable',[adminController::class,'show_exercisetable'])->name('show_exercisetable');
        Route::post('/admin/activity/save_addexercise',[adminController::class,'save_addexercise']);

        

        });

    Route::middleware(['user'])->group(function () { 
   
    //pingpong's function
    //path ของ body_measurement
    Route::get('/showbody', [bodymController::class, 'showBodyData']) -> name('body.show');
    Route::get('/insertbody', function () {return view('body.insertbodydata');} ) -> name('body.insert');
    Route::post('/showbody/insertbody', [bodymController::class, 'insertBodyData']) -> name('body.showinsert');
    Route::get('/editbody/{id}', [bodymController::class, 'editbody']) -> name('body.edit');
    Route::put('/editbody/updatebody/{id}', [bodymController::class, 'updateBody']) -> name('body.update');
    Route::get('/chartbody', [bodymController::class, 'showChartbody'])->name('body.chart');

    //path ของ exerciserecord
    Route::get('/showexercise', [exerciseController::class, 'showExerciseRecords'] ) -> name('exercise.show');
    Route::get('/insertexercise', function () {return view('exercise.insertexercise');} ) -> name('exercise.showinsert');
    Route::post('/showexercise/insertexercise', [exerciseController::class, 'insertExercis']) -> name('exercise.insert');
    Route::get('/editexercise/{id}', [exerciseController::class, 'editbody']) -> name('exercise.edit');
    Route::put('/editexercise/updateexercise/{id}', [exerciseController::class, 'updateExercise']) -> name('exercise.update');
    Route::get('/chartexercise', [exerciseController::class, 'showChartexercise'])->name('exercise.chart');


    //fang
    //sleeps
    Route::get('/sleeps', [SleepController::class,'index'])->name('sleep.index');
    Route::post('/sleeps/store', [SleepController::class,'store'])->name('sleep.store');
    Route::get('/store', function() {return view('sleep.sleep');})->name('sleep.showsleep');
    Route::get('/sleeps/edit/{id}', [SleepController::class, 'editsleep'])->name('sleep.edit');
    Route::put('/sleeps/update/{id}', [SleepController::class, 'updatesleep'])->name('sleep.update');
    Route::get('/chartsleeps', [SleepController::class, 'showChartsleep'])->name('sleep.chart');




    //men
    Route::get('/mens', [MenstruationController::class,'index'])->name('men.index');
    Route::post('/mens/stores', [MenstruationController::class, 'storemen']) ->name('men.store');
    Route::get('/stores', function() {return view('menstruation.men');})->name('men.showmen');
    Route::get('/mens/edit/{id}', [MenstruationController::class, 'editmen'])->name('men.edit');
    Route::put('/mens/update/{id}', [MenstruationController::class, 'updatemen'])->name('men.update');
    Route::get('/calmens{id}', [MenstruationController::class,'calmens']) ->name('men.calmens');
    Route::get('/chartmens', [MenstruationController::class, 'showChartmen'])->name('men.chart');




        //หน้าhome nut
    Route::get('/homepage', function () {
    return view('homepage');
    })->name('homepage');






    Route::get('/bmi', function () {
    return view('bmi');
    })->name('bmi');


    Route::POST('/bmi', [bmiController::class, 'calculateBMI']);
    Route::post('/bmi/save', [bmiController::class, 'savebmi'])->name('bmi.save');
    Route::get('/bmi/delete/{bmi_id}', [bmiController::class, 'deletebmi'])->name('bmi.delete');
    Route::get('/recommend', [bmiController::class, 'recommend'])->name('recommend');
    Route::get('/recommendpro/{bmi_id}', [bmiController::class, 'recommendpro'])->name('recommendpro');
    Route::post('/recommendpro/update', [bmiController::class, 'updaterecommend'])->name('recommendpro.update');
    Route::get('/healthrecord', function () {
    return view('healthrecord');
    })->name('healthrecord');


    // dan food
    Route::get('/healthrecord', [healthrecordController::class, 'index'])->name('healthrecord');
    Route::get('/healthrecord/board', [healthrecordController::class, 'board']);
    Route::post('/healthrecord/insert', [healthrecordController::class, 'addFoodPlan']);
    Route::get('/healthrecord/update/{id}', [healthrecordController::class, 'updatePage']);
    Route::post('/healthrecord/updated', [healthrecordController::class, 'update']);
    Route::get('/healthrecord/delete/{id}', [healthrecordController::class, 'delete']);
    Route::get('/healthrecord/chart', [healthrecordController::class, 'chart']);







    });
        
        


        

     




        
       
    
    
    
});