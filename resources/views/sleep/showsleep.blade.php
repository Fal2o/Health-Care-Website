
@extends('layouts.masterUser')


@section('title')
    HealthCare Project
@endsection

@section('content')



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ข้อมูลการนอน</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>วันที่</th>
                                        <th>เวลาเข้านอน</th>
                                        <th>เวลาตื่นนอน</th>
                                        <th>เวลาที่นอน</th>
                        
                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sleeps as $record)
                                    <tr>
                                        {{-- <td>{{date('d/m/Y', strtotime($record->date))}}</td> --}}
                                        <td>{{$record ->date}}</td>
                                        <td> {{ $record->start }}</td>
                                        <td>{{ $record->end }}</td>
                                   
                                        @php
                                            $startTimestamp = strtotime($record->start);
                                            $endTimestamp = strtotime($record->end);
                                   
                                            if ($startTimestamp !== false && $endTimestamp !== false) {
                                                if ($startTimestamp > $endTimestamp) {
                                                    // สลับตำแหน่งของเวลาเริ่มนอนและเวลาตื่นนอน
                                                    list($startTimestamp, $endTimestamp) = array($endTimestamp, $startTimestamp);
                                                }
                                   
                                                $sleepDuration = $endTimestamp - $startTimestamp;
                                                $hours = floor($sleepDuration / 3600); // 3600 วินาทีใน 1 ชั่วโมง
                                                $minutes = floor(($sleepDuration % 3600) / 60);
                                   
                                                $sleepDurationFormatted = $hours . ' ชั่วโมง ' . $minutes . ' นาที';
                                   
                                                echo "<td>".$sleepDurationFormatted."</td>";
                                            } else {
                                                echo "เวลาไม่ถูกต้อง";
                                            }
                                        @endphp
                                   
                                       
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>

                        </div>
                        <button id='goTostoresleep' class="btn btn-primary">เพิ่มข้อมูลการนอน</button>
    <script>
        document.getElementById('goTostoresleep').addEventListener('click', function() {
            window.location.href = "{{ route('sleep.showsleep') }}";
        });
    </script>


    @if ($sleeps && !$sleeps->isEmpty())
        <button id='goToeditsleep' class="btn btn-primary">แก้ไขข้อมูลการนอน</button>


        <script>
            document.getElementById('goToeditsleep').addEventListener('click', function() {
                window.location.href = "{{ route('sleep.edit', ['id' => $sleeps->last()->id]) }}";
            });
        </script>
        <button id='goTochartsleep' class="btn btn-primary" >กราฟแสดงข้อมูลการนอน</button>


        <script>
            document.getElementById('goTochartsleep').addEventListener('click', function() {
                window.location.href = "{{ route('sleep.chart') }}";
            });
        </script>
    @endif

                    </div>
                </div>
              
            </div>
        </div>

@endsection











