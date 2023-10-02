<nav>
    <ul>
    <li><a href="{{ route('homepage') }}">หน้าแรก</a></li>
    <li><a href="{{ route('healthrecord') }}">บันทึกสุขภาพ</a></li>
    <li><a href="{{ route('bmi') }}">คำนวณBMI</a></li>
    <li><a href="{{ route('recommend') }}">คำแนะนำ</a></li>
    </ul>
    </nav>
    
    
    
    
    @php
    $rec_type = [];
    foreach ($bmi->bmi_recommends as $recbmi) {
    // echo $recbmi->recommend->recommend_type;
    $id = $recbmi->recommend->recommend_type->id;
    
    
    if (!in_array($id, $rec_type)) {
    array_push($rec_type, $id);
    } else {
    # code...
    array_push($rec_type, -1);
    }
    }
    //1, 2
    sort($rec_type);
    @endphp
    <?php //print_r($bmi->bmi_recommends); ?>
    <div class="container">
    <h2>เลือกคำแนะนำที่คุณต้องการ</h2>
    <form method="post" action="/recommendpro/update">
    @csrf
    <input type="hidden" name="bmi_id" value="{{ $bmi->id }}">
    @foreach ($recommend_types as $recommend_type)
    <div>
    <input type="checkbox" name="type[]" value="{{ $recommend_type->id }}"
    {{in_array($recommend_type->id, $rec_type) ? 'checked' : '' }}>
    {{ $recommend_type->type_name }}
    </div>
    @endforeach
    
    
    <div>
    <button type="submit" id="submitRecommendations">ตกลง</button>
    </div>
    </form>
    
    
    @forelse ($bmi->bmi_recommends as $recbmi)
    {{-- <p>{{$recbmi}}</p>
    <p>{{$recbmi->recommend}}</p> --}}
    <p>{{ $recbmi->recommend->details }}</p>
    @empty
    @endforelse
    <table>
    
    
    </table>
    
    
    
    
    
    
    </div>
    
    
    
    