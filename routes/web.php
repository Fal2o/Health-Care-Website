<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\bodymController;
use App\Http\Controllers\exerciseController;

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
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');

        Route::get('/dashboard',[Controller::class,'index'])->name('dashboard');


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




        Route::get('/bmix',[Controller::class,'bmiPage'])->name('bmi');
        Route::get('/sleep',[Controller::class,'sleepPage'])->name('sleep');
        Route::get('/exercise',[Controller::class,'exercisePage'])->name('exercise');
        Route::get('/fodd',[Controller::class,'foodPage'])->name('food');
        Route::get('/body',[Controller::class,'bodyPage'])->name('body');
        Route::get('/menstruation',[Controller::class,'menstruationPage'])->name('menstruation');


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








    // ... เส้นทางอื่น ๆ ที่คุณต้องการ
});
