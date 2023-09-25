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
        
        Route::get('/admin',[adminController::class,'index'])->name('adminPage');
        Route::get('/admin/edit/{id}',[adminController::class,'edit']);
        Route::get('/admin/delete/{id}',[adminController::class,'delete']);
        Route::get('/admin/detial',[adminController::class,'detial']);
        Route::get('/admin/history',[adminController::class,'history']);
        Route::get('/admin/restore/{id}',[adminController::class,'restore']);
        Route::get('/admin/forcedelete/{id}',[adminController::class,'forcedelete']);

        });

        
        

        Route::get('/bmi',[Controller::class,'bmiPage'])->name('bmi');
        Route::get('/sleep',[Controller::class,'sleepPage'])->name('sleep');
        Route::get('/exercise',[Controller::class,'exercisePage'])->name('exercise');
        Route::get('/fodd',[Controller::class,'foodPage'])->name('food');
        Route::get('/body',[Controller::class,'bodyPage'])->name('body');
        Route::get('/menstruation',[Controller::class,'menstruationPage'])->name('menstruation');
        
        
    
    
    
    // ... เส้นทางอื่น ๆ ที่คุณต้องการ
});




