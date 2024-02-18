<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding: 10px;">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li>
            <a class="brand-link" href="{{ route('frontend.index') }}">
                <img src="{{ asset(get_setting('frontend_logo_menu')) }}" style="width:60px;height:60px;">
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">


        @guest
            <li class="nav-item">
                <x-utils.link :href="route('frontend.auth.login')" :active="activeClass(Route::is('frontend.auth.login'))" :text="__('Login')" class="nav-link" />
            </li>

            @if (config('boilerplate.access.user.registration'))
                <li class="nav-item">
                    <x-utils.link :href="route('frontend.auth.register')" :active="activeClass(Route::is('frontend.auth.register'))" :text="__('Register')" class="nav-link" />

                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                @if (!empty($balance_users?->balance))
                    <h5 style="font-size: 17px;margin-top:6px;color:rgb(70, 180, 36)">Your Balance:
                        {{ number_format($balance_users?->balance->balance,2) }} BDT
                    </h5>
                @else
                    <h5 style="font-size: 17px;margin-top:6px;color:rgb(70, 180, 36)">Your Balance:
                        00 BDT
                    </h5>
                @endif

                <x-utils.link href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <x-slot name="text">
                        <img class="rounded-circle" style="max-height: 20px" src="{{ $logged_in_user->avatar }}" />
                        {{ $logged_in_user->name ?? 'User' }} <span class="caret"></span>
                    </x-slot>
                </x-utils.link>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if ($logged_in_user->isAdmin())
                        <x-utils.link :href="route('admin.dashboard')" :text="__('Administration')" class="dropdown-item" />
                    @endif

                    @if ($logged_in_user->isUser())
                        <x-utils.link :href="route('frontend.user.dashboard')" :active="activeClass(Route::is('frontend.user.dashboard'))" :text="__('Dashboard')" class="dropdown-item" />
                    @endif

                    <x-utils.link :href="route('frontend.user.account')" :active="activeClass(Route::is('frontend.user.account'))" :text="__('My Account')" class="dropdown-item" />

                    <x-utils.link :text="__('Logout')" class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                    </x-utils.link>
                    <div class="ml-3">
                        <a href="{{ route('balance-topup') }}">Top Up</a>
                    </div>
                </div>
            </li>
        @endguest
    </ul>

</nav>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/backend.js') }}"></script>
