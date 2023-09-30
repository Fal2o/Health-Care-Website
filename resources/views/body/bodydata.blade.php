
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
                        <h4 class="card-title">ข้อมูลร่างกายในแต่ละวัน</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="">
                                    <tr>
                                        <th>วันที่</th>
                                        <th>ส่วนสูง</th>
                                        <th>น้ำหนัก</th>
                                        <th>รอบเอว</th>
                                        <th>รอบอก</th>
                                        <th>สะโพก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bodyData as $body)
                                        <tr>
                                            {{-- <td>{{ $body->created_at->format('d/m/Y') }}</td> --}}
                                            <td>{{ $body->created_at->format('d F Y')  }}</td>
                                            <td>{{ $body->height }}</td>
                                            <td>{{ $body->weight }}</td>
                                            <td>{{ $body->waist }}</td>
                                            <td>{{ $body->chest }}</td>
                                            <td>{{ $body->hips }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-info" id="goToinsertbody">เพิ่มข้อมูลร่างกายของคุณ</button>
                        <script>
                            document.getElementById('goToinsertbody').addEventListener('click', function() {
                                window.location.href = "{{ route('body.insert') }}";
                            });
                        </script>
                        @if ($bodyData && !$bodyData->isEmpty())
                            <button type="button" class="btn btn-info"
                                id="goToeditbody">แก้ไขข้อมูลร่างกายล่าสุด</button>
                            <script>
                                document.getElementById('goToeditbody').addEventListener('click', function() {
                                    window.location.href = "{{ route('body.edit', ['id' => $bodyData->last()->id]) }}";
                                });
                            </script>
                            <button type="button" class="btn btn-info" id="goToechartbody">กราฟข้อมูลร่างกาย</button>
                            <script>
                                document.getElementById('goToechartbody').addEventListener('click', function() {
                                    window.location.href = "{{ route('body.chart') }}";
                                });
                            </script>
                        @endif


                    </div>
                </div>
                {{-- <button type="button" class="btn btn-info" id="goToshowexercise">ข้อมูลการออกกำลังกายของคุณ</button>
                <script>
                    document.getElementById('goToshowexercise').addEventListener('click', function() {
                        window.location.href = "{{ route('exercise.show') }}";
                    });
                </script> --}}
            </div>
        </div>
    </body>
@endsection








