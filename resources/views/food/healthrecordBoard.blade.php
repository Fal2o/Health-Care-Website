<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        th,
        td {
            text-align: center;
            padding: 1rem !important;
        }


        td p:first-child {
            margin-top: 0;
        }


        td p:last-child {
            margin-bottom: 0;
        }


        th,
        td {
            border: 1px solid #dee2e6;
        }
    </style>
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
</head>


<body>
    <nav>
        <ul>
            <li><a href="{{ route('homepage') }}">หน้าแรก</a></li>
            <li><a href="{{ route('healthrecord') }}">บันทึกสุขภาพ</a></li>
            <li><a href="{{ route('bmi') }}">คำนวณBMI</a></li>
            <li><a href="{{ route('recommend') }}">คำแนะนำ</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="text-end mb-3">
            <a class="btn btn-primary text-white" href="/healthrecord/chart">แผนภูมิสรุปผลการรับประทานอาหาร</a>
        </div>
        <table class="table ">
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
                                <th scope="row" rowspan="{{ count($plan->diet_plan_foods)+1 }}">
                                    {{ convertDate($plan->date) }}
                                </th>
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
            </tbody>
        </table>
    </div>
</body>


</html>





