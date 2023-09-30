<?php

namespace App\Http\Controllers;


use App\Models\exerciserecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class exerciseController extends Controller
{
    function insertExercis(Request $request)
    {


        $user = Auth::user();
        // รับข้อมูลจากคำขอ
        $exerciserecord = new exerciserecord;
        $exerciserecord->user_id = $user->id;
        $exerciserecord->date = $request->input('date');
        $exerciserecord->time = $request->input('time');
        $exerciserecord->calories = $request->input('calories');
        $exerciserecord->type = $request->input('type');
        // บันทึกข้อมูลลงในฐานข้อมูล
        $exerciserecord->save();
        return redirect('/showexercise');
    }


    public function showExerciseRecords()
    {
        $user = Auth::user();
        $exerciseRecords = ExerciseRecord::where('user_id', $user->id)
            ->orderBy('date', 'asc')
            ->get();


        // แปลงวันที่ให้อยู่ในรูปแบบภาษาไทย
        foreach ($exerciseRecords as $record) {
            $record->date = date('d F Y', strtotime($record->date));
        }


        return view('exercise.showexercise', ['exerciseRecords' => $exerciseRecords]);
    }




    public function editBody($id)
    {
        $user = Auth::user();
        // ดึงข้อมูลร่างกายล่าสุดของผู้ใช้งาน
        $exercise = exerciserecord::where('user_id', $user->id)->orderBy('date', 'desc')->first();


        if (!$exercise) {
            return redirect()->route('exercise.show');
        }
        return view('exercise.editexercise', ['exercise' => $exercise]);
    }


    public function updateExercise(Request $request, $id)
    {
        // ดึงข้อมูลรายการร่างกาย   ที่ต้องการแก้ไข
        $exerciserecord = exerciserecord::find($id);


        // อัปเดตข้อมูลจากแบบฟอร์ม
        // $exerciserecord->date = $request->input('date');
        $exerciserecord->time = $request->input('time');
        $exerciserecord->calories = $request->input('calories');
        $exerciserecord->type = $request->input('type');


        // บันทึกการแก้ไขลงในฐานข้อมูล
        $exerciserecord->save();


        return redirect('/showexercise');
    }


    public function showChartexercise()
    {
        $chartData = $this->getDataForChart();
        return view('exercise.chartexercise', ['chartData' => $chartData]);
    }


    public function getDataForChart()
    {
        $user = Auth::user();
        $data = exerciserecord::where('user_id', $user->id)
            ->orderBy('date', 'asc')
            ->get();


        $time = [];
        $calories = [];


        foreach ($data as $item) {
            $time[] = $item->time;
            $calories[] = $item->calories;
        }


        return [
            'labels' => $data->pluck('date')->map(function ($date) {
                return date('d F Y', strtotime($date));
            })->toArray(),
            'time' => $time,
            'calories' => $calories,
        ];
    }

}
