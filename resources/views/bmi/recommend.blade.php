<head>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    </head>
    <nav>
    <ul>
    <li><a href="{{ route('homepage') }}">หน้าแรก</a></li>
    <li><a href="{{ route('healthrecord') }}">บันทึกสุขภาพ</a></li>
    <li><a href="{{ route('bmi') }}">คำนวณBMI</a></li>
    <li><a href="{{ route('recommend') }}">คำแนะนำ</a></li>
    </ul>
    </nav>
    <div class="container">
    
    
    
    
    <h2>ค่าBMIของคุณ {{ Auth::user()->fname }} {{ Auth::user()->lname }} ที่บันทึกไว้</h2>
    
    
    <table border="">
    <tr>
    <th>น้ำหนัก</th>
    <th>ส่วนสูง</th>
    <th>ค่าBMI</th>
    <th>เกณฑ์</th>
    <th>รายการ</th>
    <th>ลบ</th>
    </tr>
    @forelse (Auth::user()->bmis as $bmi)
    <tr>
    <td>{{ $bmi->weight }} กิโลกรัม</td>
    <td>{{ $bmi->height }} เซนติเมตร</td>
    <td>{{ $bmi->bmi }}</td>
    <td>
    @if ($bmi->bmi < 18.5)
    น้ำหนักน้อย/ผอม
    @elseif ($bmi->bmi >= 18.5 && $bmi->bmi <= 22.9)
    ปกติ(สุขภาพดี)
    @elseif ($bmi->bmi >= 23 && $bmi->bmi <= 24.9)
    ท้วม/โรคอ้วนระดับ 1
    @elseif ($bmi->bmi >= 25 && $bmi->bmi <= 29.9)
    อ้วน/โรคอ้วนระดับ 2
    @else
    อ้วนมาก/โรคอ้วนระดับ 3
    @endif
    </td>
    <td>
    <a href="{{ route('recommendpro',['bmi_id' => $bmi->id])}}"
    {{-- onclick="return confirm('ต้องเป็นผู้ใช้พรีเมียม ต้องการสมัคร?');" --}}
    >
    <button type="button" class="btn btn-outline-green">คำแนะนำ</button>
    </a>
    
    
    </td>
    <td>
    <a href="{{ route('bmi.delete', ['bmi_id' => $bmi->id]) }}"
    onclick="return confirm('ต้องการลบค่าBMI ?');">
    <button type="button" class="btn btn-outline-danger">ลบ</button>
    </a>
    
    
    </td>
    </tr>
    
    
    @empty
    <tr>
    <td colspan="5">คุณไม่ได้บันทึกค่าBMI <a href="{{ route('bmi') }}">คำนวณBMI</a></td>
    </tr>
    @endforelse
    
    
    </table>
    
    
    
    
    <h2>คำแนะนำ</h2>
    
    
    
    
    
    
    </table>
    
    
    </div>
    
    
    
    