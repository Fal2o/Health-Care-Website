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
        div {
            width: 80%;
            display: block;
            margin: 0 auto;
        }
    </style>
    @php
        $date = [];
        $cal = [];
        foreach ($plans as $index => $diet_plan) {
            $c = 0;
            foreach ($diet_plan->diet_plan_foods as $index2 => $diet_plan_food) {
                $c += $diet_plan_food->food->calorie;
            }
            array_push($date,  $diet_plan->date);
            array_push($cal, $c);
        }
    @endphp
</head>


<body>
    <div>
        <canvas id="myChart"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function convertDate(arr) {
            let result = []
            const months = [
                "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
            ];
            for (const obj of arr) {
                const [year , month, day] = obj.split('-').map(Number);
                result.push(`${day} ${months[month - 1]} ${year + 543}`);
            }


            return result;
        }
        let dates = convertDate(<?php echo json_encode($date);?>);
        let cals = <?php echo json_encode($cal);?>;
        const data = {
            labels: dates,
            datasets: [{
                label: 'แคลลอรี่ต่อวัน',
                data: cals,
                fill: false,
                borderColor: 'Purple',
                tension: 0.1
            }]
        }
        const config = {
            type: 'line',
            data: data
        }
        const ctx = document.getElementById('myChart')
        new Chart(ctx, config)
    </script>
</body>


</html>



