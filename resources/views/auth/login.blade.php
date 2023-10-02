<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>


<style>
    .subloginbutton: {
    background-color: #070D59 !important;
    padding: 0.6rem 4rem;
    font-size: .5rem;
    
    
    }
    </style>
    <x-guest-layout>
    <x-authentication-card>
    <x-slot name="logo">
    <x-authentication-card-logo />
    </x-slot>
    
    
    <x-validation-errors class="mb-4" />
    
    
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
    </div>
    @endif
    
    
    <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="font-semibold flex items-center justify-center mt-4 mb-4 pb-5" >
    <h1 style="font-size: 3rem; font-weight:100;">เข้าสู่ระบบ</h1>
    
    
    </div>
    
    
    <div>
    <x-label for="email" value="{{ __('อีเมล') }}" />
    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
    autofocus autocomplete="username" />
    </div>
    
    
    <div class="mt-4">
    <x-label for="password" value="{{ __('รหัสผ่าน') }}" />
    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
    autocomplete="current-password" />
    </div>
    
    
    <div class="block mt-4">
    <label for="remember_me" class="flex items-center">
    <x-checkbox id="remember_me" name="remember" />
    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
    </div>
    
    
    <div class="flex items-center justify-center mt-4">
    @if (Route::has('password.request'))
    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
    {{ __('Forgot your password?') }}
    </a> --}}
    @endif
    
    
    <x-button class="px-4 subloginbutton"
    style="background-color: #070D59 !important;padding: 0.6rem 4rem;font-size:.8rem;">
    {{ __('เข้าสู่ระบบ') }}
    </x-button>
    
    
    </div>
    
    
    <div class="px-4 subloginbutton flex items-center justify-center mt-4" style="font-size:.8rem;">
    <h1>หรือ</h1>
    </div>
    <hr class="my-4 border-1.5">
    </form>
    <div class="flex items-center justify-center mt-4">
    <a href="{{ route('register') }}"><x-button class="px-4 subloginbutton"
    style="background-color: #00403A !important;padding: 0.6rem 4rem;font-size:.9rem;">
    {{ __('ลงทะเบียน') }}
    </x-button>
    </a>
    </div>
    </x-authentication-card>
    </x-guest-layout>
    
    
    
    