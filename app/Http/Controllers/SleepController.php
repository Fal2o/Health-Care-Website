<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\sleep;
use Illuminate\Support\Facades\Auth;




class SleepController extends Controller
{
    public function store(Request $request)
    {


        $user = Auth::user();




        $sleep = new Sleep();


        $sleep->date = $request->input('date');
        $sleep->start = $request->input('start');
        $sleep->end = $request->input('end');
        $sleep->user_id = $user->id;






        $sleep->save();




        return redirect('/sleeps');
    }


    public function index()
    {
        $user = Auth::user();
        $sleepdata = sleep::where('user_id', $user->id)->orderBy('date', 'asc')->get();
        foreach ($sleepdata as $value) {
            $value->date = date('d F Y', strtotime($value->date));
        }
        return view('sleep.showsleep', ['sleeps' => $sleepdata]);
    }


    public function editsleep($id)
    {
        $user = Auth::user();
        $sleep = sleep::where('user_id', $user->id)->orderBy('date', 'desc')->first();


        if (!$sleep) {


            return redirect('/sleeps');
        }


        return view('sleep.editsleep', compact('sleep'));


    }


    public function updatesleep(Request $request, $id)
    {


        $sleep = sleep::find($id);


        if (!$sleep) {


            return redirect('/sleeps');
        }


        // อัปเดตข้อมูล
        // $sleep->date = $request->input('date');
        $sleep->start = $request->input('start');
        $sleep->end = $request->input('end');




        $sleep->save();


        return redirect('/sleeps');
    }


    public function showChartsleep()
    {
        $user = Auth::user();
        $chartData = $this->getDataForChart();
        // $sleep = sleep::where('user_id', $user->id)->orderBy('date', 'desc')->first();
        return view('sleep.chartsleep', ['chartData' => $chartData]);
    }


    public function getDataForChart()
    {
        $user = Auth::user();
        $data = sleep::where('user_id', $user->id)
            ->orderBy('date', 'asc')
            ->get();
        $arrsleep = [];
        foreach ($data as $record) {
            $startTimestamp = strtotime($record->start);
            $endTimestamp = strtotime($record->end);


            if ($startTimestamp !== false && $endTimestamp !== false) {
                if ($startTimestamp > $endTimestamp) {
                    [$startTimestamp, $endTimestamp] = [$endTimestamp, $startTimestamp];
                }


                $sleepDuration = $endTimestamp - $startTimestamp;
                $hours = ($sleepDuration / 3600);
                $minutes = (($sleepDuration % 3600) / 60 / 60);


                $sleepDurationFormatted = intval($hours + $minutes);


                $arrsleep[] = ($sleepDurationFormatted);
            }
        }
        return [
            'labels' => $data->pluck('date')->map(function ($date) {
                return date('d F Y', strtotime($date));
            })->toArray(),
            'time'=> $arrsleep
        ];




    }


}

