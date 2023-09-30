<?php


namespace App\Http\Controllers;


use App\Models\body_measurement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class bodymController extends Controller
{


    public function insertBodyData(Request $request)
    {
        $user = Auth::user();
        // รับข้อมูลจากคำขอ
        $body_measurement = new body_measurement;
        $body_measurement->user_id = $user->id;
        $body_measurement->height = $request->input('height');
        $body_measurement->weight = $request->input('weight');
        $body_measurement->waist = $request->input('waist');
        $body_measurement->chest = $request->input('chest');
        $body_measurement->hips = $request->input('hips');
        // บันทึกข้อมูลลงในฐานข้อมูล
        $body_measurement->save();
        return redirect('/showbody');
        // return view('bodydata', ['bodyData' => $bodyData]);
    }


    public function showBodyData()
    {
        $user = Auth::user();
        $bodyData = body_measurement::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();


        foreach ($bodyData as $record) {
            $record = $record->created_at->format('d F Y');;
        }


        return view('body.bodydata', ['bodyData' => $bodyData]);
    }


    public function editBody($id)
    {
        $user = Auth::user();
        // ดึงข้อมูลร่างกายล่าสุดของผู้ใช้งาน
        $body = body_measurement::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();


        if (!$body) {
            return redirect()->route('body.show');
        }
        return view('body.editbody', ['body' => $body]);
    }


    public function updateBody(Request $request, $id)
    {
        // ดึงข้อมูลรายการร่างกาย   ที่ต้องการแก้ไข
        $body = body_measurement::find($id);


        // อัปเดตข้อมูลจากแบบฟอร์ม
        $body->height = $request->input('height');
        $body->weight = $request->input('weight');
        $body->waist = $request->input('waist');
        $body->chest = $request->input('chest');
        $body->hips = $request->input('hips');


        // บันทึกการแก้ไขลงในฐานข้อมูล
        $body->save();


        return redirect('/showbody');
    }


    public function showChartbody()
    {
        $chartData = $this->getDataForChart();
        return view('body.chartbody', ['chartData' => $chartData]);
    }




    public function getDataForChart()
    {
        $user = Auth::user();
        $data = body_measurement::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();


        $weight = [];
        $waist = [];
        $chest = [];
        $hips = [];


        foreach ($data as $item) {
            $weight[] = $item->weight;
            $waist[] = $item->waist;
            $chest[] = $item->chest;
            $hips[] = $item->hips;
        }


        return [
            'labels' => $data->pluck('created_at')->map(function ($date) {
                return $date->format('d F Y');
            })->toArray(),
            'weights' => $weight,
            'waists' => $waist,
            'chests' => $chest,
            'hips' => $hips,
        ];
    }


}



