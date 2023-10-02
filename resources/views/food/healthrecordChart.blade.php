@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection

@section('content')

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


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>แสดงกราฟเส้น</h3>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        
        <a href="/healthrecord/board" class="btn btn-primary">Back</a>
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
@endsection





