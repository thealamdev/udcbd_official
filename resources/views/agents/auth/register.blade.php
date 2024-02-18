@extends('frontend.layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <div class="container pb-5" style="padding-top:180px;">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="card" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;">
                    <div class="card-header text-center">
                        <h2>AGENT REGISTER</h2>
                        <p>Register to go for getting all details</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('frontend.auth.agent.registered') }}" method="POST" id="registerForm">
                            @csrf
                            <input type="hidden" name="agent_id" value="{{ request()->id }}">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="{{ __('Name') }}" maxlength="100" required
                                    autofocus autocomplete="name"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ old('phone') }}" placeholder="{{ __('Phone') }}" maxlength="100" required
                                    autofocus autocomplete="phone"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                                @error('phone')
                                    <script type="text/javascript">
                                        swal('{{ $message }}');
                                    </script>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255"
                                    required autocomplete="email"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                                @error('email')
                                    <script type="text/javascript">
                                        swal('{{ $message }}');
                                    </script>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="new-password"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                                @error('password')
                                    <script type="text/javascript">
                                        swal('{{ $message }}');
                                    </script>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="{{ __('Confirm Password') }}" maxlength="100"
                                    required autocomplete="new-password"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                            </div>

                            <div class="form-group">
                                <select name="register_for" id="register_for" class="form-control" required
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;">
                                    <option value="এজেন্ট">এজেন্ট</option>
                                </select>
                            </div>

                            <div class="form-check" style="padding-bottom: 10px;">
                                <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input"
                                    required>
                                <label class="form-check-label" for="terms">
                                    @lang('I agree to the') <a href="{{ route('frontend.pages.terms') }}"
                                        target="_blank">@lang('Terms & Conditions')</a>
                                </label>
                            </div>

                            @if (config('boilerplate.access.captcha.registration'))
                                <div class="cta-form-col d-flex justify-content-between">
                                    <div class="col-md-4">
                                        @captcha
                                        <input type="hidden" name="captcha_status" value="true" />
                                    </div>
                                </div>
                            @endif
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">@lang('Sign Up')</button>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Already have an account? | <a href="{{ route('frontend.auth.login') }}">Login</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
        </div>
    </div>
@endsection
