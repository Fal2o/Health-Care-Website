<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    @php
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
    @endphp
</head>


<body>
    {{-- {{ $plan->food }} --}}
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                บันทึกการรับประทานอาหาร {{ convertDate($plan->diet_plan->date) }}
            </div>
            <div class="card-body">
                <form action="/healthrecord/updated" method="post">
                    @csrf
                    <input name="id" value="{{$plan->id}}" class="form-control" readonly hidden>
                    <select name="menu" id="select-menu" class="form-select mb-3" required>
                        <option value="">เลือกเมนูอาหาร</option>
                        @forelse ($food as $i)
                            <option class="{{ $i->calorie }}" {{($plan->food->id==$i->id)? "selected":''}}  value="{{$i->id}}">{{$i->food_name}}</option>
                        @empty
                            <option value="">ไม่มีข้อมูลอาหาร</option>
                        @endforelse
                    </select>
                    <div class="mb-3">
                        <input id="calorie" value="0" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        const selectMenu = document.querySelector("#select-menu")
        const options = document.querySelectorAll('option')
        const calorie = document.querySelector("#calorie")
        options.forEach(element => {
            if(element.selected){
                calorie.value = element.className
            }
        });
        selectMenu.addEventListener('change',()=>{
            for (const e of options) {
                if(e.value==selectMenu.value){
                    calorie.value = e.className
                }
            }
        })
    </script>
</body>


</html>





