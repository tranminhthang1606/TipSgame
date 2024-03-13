<div class="flex space-x-5">


    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
        {{ __('Đăng nhập') }}
    </x-nav-link>

    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
        {{ __('Đăng ký') }}
    </x-nav-link>
</div>
