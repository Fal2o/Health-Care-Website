<?php


namespace App\Http\Controllers;


use DateTime;
use Illuminate\Http\Request;
use App\Models\menstruation;
use Illuminate\Support\Facades\Auth;


class MenstruationController extends Controller
{
    public function storemen(Request $request)
    {


        $user = Auth::user();


        $men = new menstruation();
        $men->start = $request->input('start');
        $men->end = $request->input('end');
        $men->user_id = $user->id;




        $men->save();




        return redirect('/mens');
    }


    public function index()
    {
        $user = Auth::user();
        $mendata = menstruation::where('user_id', $user->id)->orderBy('created_at', 'asc')->get();


        foreach ($mendata as $value) {
            $value->start = date('d F Y', strtotime($value->start));
            $value->end = date('d F Y', strtotime($value->end));
        }


        return view('menstruation.showmen', ['men' => $mendata]);
    }


    public function editmen($id)
    {
        $user = Auth::user();
        $men = menstruation::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();


        if (!$men) {


            return redirect('/mens');
        }


        return view('menstruation.editmen', compact('men'));


    }


    public function updatemen(Request $request, $id)
    {


        $men = menstruation::find($id);


        if (!$men) {


            return redirect('/mens');
        }




        $men->start = $request->input('start');
        $men->end = $request->input('end');


        $men->save();


        return redirect('/mens');
    }
    public function calmens($id)
    {


        // $latestMenstruation = Menstruation::latest()->first();
        // $user = Auth::user();
        $latestMenstruation = menstruation::find($id);


        // ตรวจสอบว่ามีข้อมูลหรือไม่
        if ($latestMenstruation) {
            // แปลงวันที่ให้อยู่ในรูปแบบของ DateTime
            $start_date = strtotime($latestMenstruation->start);
            $end_date = strtotime($latestMenstruation->end);


            // คำนวณนับวัน เพิ่ม 28 วัน
            $new_date_timestamp = $start_date + (28 * 24 * 60 * 60); // 28 วัน * 24 ชั่วโมง * 60 นาที * 60 วินาที


            // แปลง timestamp ใหม่เป็นวันที่
            $new_date = date('d F Y', $new_date_timestamp);






            return view('menstruation.calmens', compact('new_date'));
        }
    }


    public function showChartmen()
    {
        $user = Auth::user();
        $chartData = $this->getDataForChart();
        // $sleep = sleep::where('user_id', $user->id)->orderBy('date', 'desc')->first();
        return view('menstruation.chartmen', ['chartData' => $chartData]);
    }


    public function getDataForChart()
    {
        $user = Auth::user();
        $data = menstruation::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
   
        $arrmen = [];
        $startDates = []; // เก็บวันที่เริ่มการมีประจำเดือน
        $endDates = []; // เก็บวันที่สิ้นสุดการมีประจำเดือน
   
        foreach ($data as $m) {
            $start_date = strtotime($m->start);
            $end_date = strtotime($m->end);
   
            $duration_in_seconds = $end_date - $start_date;
            $duration_in_days = $duration_in_seconds / (60 * 60 * 24);
   
            $arrmen[] = intval($duration_in_days);
            $startDates[] = date('d F Y', strtotime($m->start)); // เก็บวันที่เริ่มการมีประจำเดือน
            $endDates[] = date('d F Y', strtotime($m->end)); // เก็บวันที่สิ้นสุดการมีประจำเดือน
        }
   
        return [
            'labels' => $startDates, // ใช้วันที่เริ่มการมีประจำเดือนเป็น labels
            'startDate' => $startDates, // เพิ่มข้อมูลวันที่เริ่มการมีประจำเดือน
            'endDate' => $endDates, // เพิ่มข้อมูลวันที่สิ้นสุดการมีประจำเดือน
            'time' => $arrmen
        ];
    }
   
}

