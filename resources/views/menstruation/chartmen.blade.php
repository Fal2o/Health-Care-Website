

@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>แสดงกราฟแท่ง</h3>
                </div>
                <div class="card-body">
                    <canvas id="lineChart" width="500" height="200"></canvas>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

    </div>

    <script>
        var ctx = document.getElementById('lineChart').getContext('2d');
        var Data = <?php echo json_encode($chartData); ?>;


        var lineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Data.labels.map(function(label, index) {
                    return Data.startDate[index] + ' - ' + Data.endDate[index];
                }),
                datasets: [{
                    label: 'ระยะเวลาการมีประจำเดือน (วัน)',
                    data: Data.time,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                y: {
                    beginAtZero: true,
                },
                scales: {
                    y: {
                        beginAtZero: true, // ให้สเกลเริ่มต้นที่ 0
                        ticks: {
                            stepSize: 1, // กำหนดช่วงของค่า


                            callback: function(value, index, values) {
                                return value + ' วัน'; // เพิ่ม 'ชั่วโมง' ต่อท้ายค่า
                            }
                        },
                    },
                },
            }
        });
    </script>




    <button id='goTostoremen' class="btn btn-primary">เพิ่มข้อมูลการเป็นประจำเดือน</button>
    <script>
        document.getElementById('goTostoremen').addEventListener('click', function() {
            window.location.href = "{{ route('men.showmen') }}";
        });
    </script>

@endsection





        










