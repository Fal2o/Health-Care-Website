


   
  










   
   







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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
            </script>
        </div>
    </div>

    <script>
        const options = {
            timeZone: 'Asia/Bangkok'
        };
        var ctx = document.getElementById('lineChart').getContext('2d');
        var sleepdata = <?php echo json_encode($chartData); ?>;
       


        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: sleepdata.labels,
                datasets: [{
                    label: 'เวลาการนอน(ชั่วโมง)',
                    data: sleepdata.time,
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
                            stepSize: 1 , // กำหนดช่วงของค่า


                            callback: function(value, index, values) {
                                return value + ' ชั่วโมง'; // เพิ่ม 'ชั่วโมง' ต่อท้ายค่า
                            }
                        },
                    },
                },
            }
        });
    </script>
   
    <button id='goTostoresleep' class="btn btn-primary">เพิ่มข้อมูลการนอน</button>
    <script>
        document.getElementById('goTostoresleep').addEventListener('click', function() {
            window.location.href = "{{ route('sleep.showsleep') }}";
        });
    </script>
@endsection





        









