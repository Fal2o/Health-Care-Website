







@extends('layouts.masterUser')


@section('title')
    HealthCare Project
@endsection

@section('content')

@php
if (!function_exists('convertDate')) {
    function convertDate($date)
    {
        $months = [
            1 => 'มกราคม',
            2 => 'กุมภาพันธ์',
            3 => 'มีนาคม',
            4 => 'เมษายน',
            5 => 'พฤษภาคม',
            6 => 'มิถุนายน',
            7 => 'กรกฎาคม',
            8 => 'สิงหาคม',
            9 => 'กันยายน',
            10 => 'ตุลาคม',
            11 => 'พฤศจิกายน',
            12 => 'ธันวาคม',
        ];
        $timestamp = strtotime($date);
        $day = date('j', $timestamp);
        $month = $months[(int) date('n', $timestamp)];
        $year = date('Y', $timestamp) + 543;
        return "วันที่ {$day} {$month} {$year}";
    }
}
@endphp



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">แผนภูมิสรุปผลการรับประทานอาหาร?</h4>
                    </div>
                    <div class="card-body">                       
                        <div class="table-responsive">
                            <table class="table">

                                <thead>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">รายการอาหาร</th>
                                    <th scope="col">แคลลอรี่</th>
                                    <th scope="col" colspan="2">Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($plans as $plan)
                                        @php
                                            $totalCal = 0;
                                        @endphp
                                        @forelse ($plan->diet_plan_foods as $index => $diet_plan_food)
                                            @php
                                                $totalCal += $diet_plan_food->food->calorie;
                                            @endphp
                                            <tr>
                                                @if ($index === 0)
                                                    <td scope="row" rowspan="{{ count($plan->diet_plan_foods)+1 }}">
                                                        {{ convertDate($plan->date) }}
                                                    </td>
                                                @endif
                                                <td>{{ $diet_plan_food->food->food_name }}</td>
                                                <td>{{ number_format($diet_plan_food->food->calorie) }} kcal</td>
                                                <td colspan="2">
                                                    <button class="px-3 btn btn-warning me-3"><a href="/healthrecord/update/{{$diet_plan_food->id}}" class="text-decoration-none text-dark">แก้ไข</a></button>
                                                    <a onclick="return confirm('ต้องการลบรายการนี้?')" href="/healthrecord/delete/{{$diet_plan_food->id}}" class="px-4 btn btn-danger text-decoration-none text-white">ลบ</a>
                                                </td>
                                            </tr>
                                            @if ($index === count($plan->diet_plan_foods) - 1)
                                                <tr>
                                                    <td colspan="4" class="text-end font-weight-bold">
                                                        <span class="me-4">แคลลอรี่ทั้งหมด</span> <span class="me-4">{{ number_format($totalCal) }}</span> kcal
                                                    </th>
                                                </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <th scope="row" rowspan="1">
                                                    {{ convertDate($plan->date) }}
                                                </th>
                                                <td colspan="4">ไม่มีรายการอาหาร</td>
                                            </tr>
                                        @endforelse
                                    @empty
                                        <tr>
                                            <td colspan="6">ไม่มีบันทึกการรับประทานอาหาร</td>
                                        </tr>
                                    @endforelse
                            </table>
                        </div> 
                        <a class="btn btn-primary text-white-right" href="/healthrecord/chart">แผนภูมิสรุปผลการรับประทานอาหาร</a>
                        <a href="/healthrecord" class="btn ">ย้อนกลับ</a>
                    </div>
                </div>
              
            </div>
        </div>

@endsection



</tbody>







