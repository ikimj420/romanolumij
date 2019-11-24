@extends('layouts.app')
@section('content')
<section class="ftco-section ftco-section-2 section-signup page-header img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 mb-4 mb-md-0">
                <div class="card card-login py-4">
                    <form class="form-login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">{{ __('app.login') }}</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"> <i class="ion-ios-contact"></i> </span>
                                </div>
                                <input id="login" type="text" placeholder="{{ __('app.userOrEmail') }}" class="form-control{{ $errors->has('username') || $errors->has('email') ? 'is-invalid' : '' }}" name="login" value="{{ old('username') ? : old('email') }}" required autocomplete="login" autofocus>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="ion-ios-lock"></i> </span>
                                </div>
                                <input id="password" type="password" placeholder="{{ __('app.password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>

                            <div class="toggle-button-cover mb-3">
                                <div class="form-check">
                                    <label class="custom-control fill-checkbox">
                                        <input type="checkbox" class="fill-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description">{{ __('app.remember') }}</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary"> {{ __('app.login') }} </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}"> {{ __('app.forgetPassword') }} </a>
                            @endif
                        </div>

                        <div class="toggle-button-cover mb-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
