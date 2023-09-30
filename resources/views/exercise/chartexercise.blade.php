

@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection




@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>แสดงกราฟเส้น</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart" width="500" height="200"></canvas>
                    </div>
                </div>
                <button type="button" class="btn btn-info" id="goToshowbody">ข้อมูลการออกกำลังกายในแต่ละวัน</button>
                <script>
                    document.getElementById('goToshowbody').addEventListener('click', function() {
                        window.location.href = "{{ route('exercise.show') }}";
                    });
                </script>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
        <script>
            var ctx = document.getElementById('lineChart').getContext('2d');
            var Data = <?php echo json_encode($chartData); ?>;


            var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Data.labels,
                    datasets: [{
                            label: 'เวลาที่ออกำลังกาย',
                            data: Data.time,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: 'แคลอลี่',
                            data: Data.calories,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            fill: false
                        }
                    ]
                },
                options: {
                    y: {
                        beginAtZero: true
                    }
                }
            });
        </script>
@endsection




