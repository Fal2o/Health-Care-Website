@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection




@section('content')



    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ข้อมูลการออกกำลังกายของคุณ</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="">
                                    <tr>
                                        <th>วันที่</th>
                                        <th>เวลาที่ออกกำลังกาย</th>
                                        <th>แคลอลี่</th>
                                        <th>ประเภทการออกกำลังกาย</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exerciseRecords as $exercise)
                                        <tr>
                                            {{-- <td>{{ date('d/m/Y', strtotime($exercise->date)) }}</td> --}}
                                            <td>{{ $exercise->date }}</td>
                                            {{-- <td>{{ $exercise->date }}</td> --}}
                                            <td>{{ $exercise->time }} นาที</td>
                                            <td>{{ $exercise->calories }}</td>
                                            <td>{{ $exercise->type }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <button type="button" class="btn btn-info"
                            id="goToinsertexercise">เพิ่มข้อมูลการออกกำลังกายของคุณ</button>
                        <script>
                            document.getElementById('goToinsertexercise').addEventListener('click', function() {
                                window.location.href = "{{ route('exercise.showinsert') }}";
                            });
                        </script>
                        @if ($exerciseRecords && !$exerciseRecords->isEmpty())
                            <button type="button" class="btn btn-info"
                                id="goToeditexercise">แก้ไขข้อมูลการออกกำลังกายล่าสุด</button>
                            <script>
                                document.getElementById('goToeditexercise').addEventListener('click', function() {
                                    window.location.href = "{{ route('exercise.edit', ['id' => $exerciseRecords->last()->id]) }}";
                                });
                            </script>
                            <button type="button" class="btn btn-info"
                                id="goToechartexercise">กราฟข้อมูลการออกกำลังกาย</button>
                            <script>
                                document.getElementById('goToechartexercise').addEventListener('click', function() {
                                    window.location.href = "{{ route('exercise.chart') }}";
                                });
                            </script>
                        @endif
                    </div>
                </div>
                {{-- <button type="button" class="btn btn-info" id="goToshowbody">ข้อมูลร่างกายในแต่ละวัน</button>
                <script>
                    document.getElementById('goToshowbody').addEventListener('click', function() {
                        window.location.href = "{{ route('body.show') }}";
                    });
                </script> --}}
            </div>
        </div>


@endsection







