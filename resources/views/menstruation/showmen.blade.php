
@extends('layouts.masterUser')


@section('title')
    HealthCare Project
@endsection

@section('content')



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ข้อมูลปรจำเดือน</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>วันที่เริ่มเป็นประจำเดือน</th>
                                        <th>วันที่สิ้นสุดการเป็นประจำเดือน</th>
                                        <th>ระยะเวลาการเป็นประจำเดือน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($men as $m)
                                        <tr>
                                            @php
                                                $start_date = strtotime($m->start);
                                                $end_date = strtotime($m->end);
                                                $duration_in_seconds = $end_date - $start_date;
                                                $duration_in_days = $duration_in_seconds / (60 * 60 * 24);   
                                            @endphp
                                            <td>{{ $m->start }}</td>
                                            <td>{{ $m->end }}</td>
                                            <td>{{ $duration_in_days }} วัน</td>                  
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button id='goTostoremen' class="btn btn-primary">เพิ่มข้อมูลการเป็นประจำเดือน</button>
                        <script>
                            document.getElementById('goTostoremen').addEventListener('click', function() {
                                window.location.href = "{{ route('men.showmen') }}";
                            });
                        </script>
                    
                    
                        @if ($men && !$men->isEmpty())
                            <button id='goToeditmen' class="btn btn-primary" >แก้ไขข้อมูลประจำเดือน</button>
                    
                    
                            <script>
                                document.getElementById('goToeditmen').addEventListener('click', function() {
                                    window.location.href = "{{ route('men.edit', ['id' => $men->last()->id]) }}";
                                });
                            </script>
                        @endif
                        @if ($men && !$men->isEmpty())
                            <button id='gotocal' class="btn btn-primary">ดูการคาดการรอบประจำเดือนในครั้งถัดไป</button>
                    
                    
                            <script>
                                document.getElementById('gotocal').addEventListener('click', function() {
                                    window.location.href = "{{ route('men.calmens', ['id' => $men->last()->id]) }}";
                                });
                            </script>
                            <button id='gotochartmen' class="btn btn-primary" >กราฟการเป็นประจำเดือน</button>
                    
                    
                            <script>
                                document.getElementById('gotochartmen').addEventListener('click', function() {
                                    window.location.href = "{{ route('men.chart') }}";
                                });
                            </script>
                        @endif
                    </div>
                </div>
              
            </div>
        </div>

@endsection












