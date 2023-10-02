
<x-guest-layout>
    <x-authentication-card>
    <x-slot name="logo">
    <x-authentication-card-logo />
    </x-slot>
    
    
    <x-validation-errors class="mb-4" />
    
    
    <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="font-semibold flex items-center justify-center mt-4 mb-4 pb-5" >
    <h1 style="font-size: 3rem; font-weight:100;">ลงทะเบียน</h1>
    
    
    </div>
    
    
    <div class="mt-4">
    <x-label for="name" value="{{ __('ชื่อผู้ใช้') }}" />
    <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('name')" required
    autofocus autocomplete="name" />
    </div>
    <div class="mt-4">
    <x-label for="name" value="{{ __('ชื่อ') }}" />
    <x-input id="name" class="block mt-1 w-full" type="text" name="fname" :value="old('name')" required
    autofocus autocomplete="name" />
    </div>
    <div class="mt-4">
    <x-label for="name" value="{{ __('นามสกุล') }}" />
    <x-input id="name" class="block mt-1 w-full" type="text" name="lname" :value="old('name')" required
    autofocus autocomplete="name" />
    </div>
    
    
    <div class="mt-4">
    <x-label for="email" value="{{ __('อีเมล') }}" />
    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
    required autocomplete="username" />
    </div>
    
    
    <div class="mt-4">
    <x-label for="password" value="{{ __('รหัสผ่าน') }}" />
    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
    autocomplete="new-password" />
    </div>
    
    
    <div class="mt-4">
    <x-label for="password_confirmation" value="{{ __('ยืนยันรหัสผ่าน') }}" />
    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
    name="password_confirmation" required autocomplete="new-password" />
    </div>
    <div class="mt-4">
    <x-label for="password_confirmation" value="{{ __('เพศ') }}" />
    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="gender" name="gender" required>
    <option value="ชาย">ชาย</option>
    <option value="หญิง">หญิง</option>
    
    
    </select>
    {{-- <x-input id="birth" class="block mt-1 w-full" type="text"
    
    
    
    
    name="gender" required autocomplete="new-password" /> --}}
    </div>
    <div class="mt-4">
    <x-label for="password_confirmation" value="{{ __('วันเกิด') }}" />
    <x-input id="birth" class="block mt-1 w-full" type="date"
    name="birth" required />
    </div>
    
    
    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
    <div class="mt-4">
    <x-label for="terms">
    <div class="flex items-center">
    <x-checkbox name="terms" id="terms" required />
    
    
    <div class="ml-2">
    {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' =>
    '<a target="_blank" href="' .
    route('terms.show') .
    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
    __('Terms of Service') .
    '</a>',
    'privacy_policy' =>
    '<a target="_blank" href="' .
    route('policy.show') .
    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
    __('Privacy Policy') .
    '</a>',
    ]) !!}
    </div>
    </div>
    </x-label>
    </div>
    @endif
    
    
    <div class="flex items-center justify-center mt-4">
    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    href="{{ route('login') }}">
    {{ __('Already registered?') }}
    </a> --}}
    
    
    <x-button class="px-4 subloginbutton"
    style="background-color: #00403A !important;padding: 0.6rem 4rem;font-size:.9rem;">
    {{ __('ลงทะเบียน') }}
    </x-button>
    </div>
    <div class="px-4 subloginbutton flex items-center justify-center mt-4" style="font-size:.8rem;">
    <h1>หรือ</h1>
    </div>
    
    
    <hr class="my-4 border-1.5">
    
    
    </form>
    <div class="flex items-center justify-center mt-4">
    
    
    <a href="{{ route('login') }}"> <x-button class="px-4 subloginbutton"
    style="background-color: #070D59 !important;padding: 0.6rem 4rem;font-size:.9rem;">
    {{ __('เข้าสู่ระบบ') }}
    </x-button>
    </a>
    
    
    </div>
    
    
    </x-authentication-card>
    </x-guest-layout>
    
    
    <script>
    // เราเพิ่ม Event Listener สำหรับ input events ในฟิลด์ที่มี id เป็น "birth"
    document.getElementById('birth').addEventListener('input', function() {
    // เมื่อผู้ใช้ป้อนข้อมูลลงในฟิลด์
    
    
    // สร้างวัตถุ Date จากค่าที่ผู้ใช้ป้อน
    var selectedDate = new Date(this.value);
    
    
    // สร้างวัตถุ Date ปัจจุบัน
    var currentDate = new Date();
    
    
    // ลบ 5 ปีจากวันที่ปัจจุบัน ใช้ setFullYear() เพื่อกำหนดปีใหม่ของ currentDate
    // getFullYear() ใช้ดึงค่าปีจากวันที่ ที่กำหนดในวัตถุ Date ค่าที่ getFullYear() ส่งออกคือจำนวนเต็มที่แทนปีของวันที่นั้น ๆ
    currentDate.setFullYear(currentDate.getFullYear() - 5);
    
    
    // เปรียบเทียบว่าวันที่ที่ผู้ใช้เลือกมากกว่าวันที่ทำให้มีอายุมากกว่า 5 ปีหรือไม่
    if (selectedDate > currentDate) {
    // ถ้าไม่ตรงตามเงื่อนไข แสดงข้อความแจ้งเตือน
    alert('กรุณาเลือกวันที่ที่ทำให้คุณมีอายุมากกว่า 5 ปี');
    
    
    // ล้างค่าในฟิลด์
    this.value = '';
    }
    });
    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    