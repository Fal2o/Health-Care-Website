<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\diet_plan;
use App\Models\User;

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

//เส้นทางสำหรับ Admin



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

   
        // เส้นทางสำหรับผู้ใช้ทั่วไป
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');



        
        Route::middleware(['admin'])->group(function () {
        // Homepage addmin
        Route::get('/admin',[adminController::class,'index'])->name('adminPage');
        // CRUD
        Route::get('/admin/edit/{id}',[adminController::class,'edit']);
        Route::get('/admin/delete/{id}',[adminController::class,'delete']);
        Route::get('/admin/detial',[adminController::class,'detial']);
        Route::get('/admin/history',[adminController::class,'history']);
        Route::get('/admin/restore/{id}',[adminController::class,'restore']);
        Route::get('/admin/forcedelete/{id}',[adminController::class,'forcedelete']);
        //Activity
        Route::get('/admin/activity',[adminController::class,'activity']);
        Route::get('/admin/activity/food',[adminController::class,'foodtable']);
        Route::get('/admin/activity/exercise',[adminController::class,'exercisetable']);
        Route::get('/admin/activity/addfood',[adminController::class,'addfood']);
        Route::get('/admin/activity/show_foodtable',[adminController::class,'show_foodtable'])->name('show_foodtable');
        Route::post('/admin/activity/save_addfood',[adminController::class,'save_foodtable']);
        

        });

        
        

        Route::get('/bmi',[Controller::class,'bmiPage'])->name('bmi');
        Route::get('/sleep',[Controller::class,'sleepPage'])->name('sleep');
        Route::get('/exercise',[Controller::class,'exercisePage'])->name('exercise');
        Route::get('/fodd',[Controller::class,'foodPage'])->name('food');
        Route::get('/body',[Controller::class,'bodyPage'])->name('body');
        Route::get('/menstruation',[Controller::class,'menstruationPage'])->name('menstruation');
        
        
    
    
    
    // ... เส้นทางอื่น ๆ ที่คุณต้องการ
});




