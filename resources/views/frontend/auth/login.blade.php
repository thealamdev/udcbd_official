@extends('frontend.layouts.app')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <div class="container pb-5" style="padding-top:180px;">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="card" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;">
                    <div class="card-header text-center">
                        <h2>Login</h2>
                        <p>Login to go for getting all details</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('frontend.auth.login') }}" method="POST" id="loginForm">
                            @csrf
                            <div class="form-group">
                                {{-- <label for="email">Email</label> --}}
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="{{ __('Phone NUmber') }}" value="{{ old('phone') }}" maxlength="255"
                                    required autofocus autocomplete="phone"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                            </div>
                            <div class="form-group">
                                {{-- <label for="password">Password</label> --}}
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="{{ __('Password') }}" maxlength="100" required
                                    autocomplete="current-password"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                            </div>
                            @error('phone')
                                <script type="text/javascript">
                                    swal('{{ $message }}');
                                </script>
                            @enderror
                            @error('password')
                                <script type="text/javascript">
                                    swal('{{ $message }}');
                                </script>
                            @enderror

                            <div class="form-group text-center" style="padding-bottom: 5px;">
                                <div class="form-check">
                                    <input name="remember" id="remember" class="form-check-input" type="checkbox"
                                        {{ old('remember') ? 'checked' : '' }} />

                                    <label class="form-check-label" for="remember">
                                        @lang('Remember Me')
                                    </label>
                                </div>
                            </div>

                            @if (config('boilerplate.access.captcha.login'))
                                <div class="col">
                                    @captcha
                                    <input type="hidden" name="captcha_status" value="true" />
                                </div>
                            @endif

                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">@lang('LOGIN')</button>
                            </div>
                            {{-- <div style="padding-top: 10px;">
                                <x-utils.link :href="route('frontend.auth.password.request')" class="btn-1" :text="__('Forgot Your Password?')" />
                            </div> --}}
                            <div class="text-center">
                                @include('frontend.auth.includes.social')
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>New to {{ app_name() }}? | <a href="{{ route('frontend.auth.register') }}">Create
                                Account</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
        </div>
    </div>
@endsection
