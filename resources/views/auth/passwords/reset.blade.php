@extends('layouts.app')
@section('content')
<section class="ftco-section ftco-section-2 section-signup page-header img" style="background-image: url({!! asset('/storage/images/login.jpg') !!});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 mb-4 mb-md-0">
                <div class="card card-login py-4">
                    <form class="form-login" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">{{ __('Reset Password') }}</h4>
                        </div>

                        <div class="card-body p-4">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-contact"></i>
                                  </span>
                                </div>
                                <input id="email" type="email" class="form-control
                                    @error('email') is-invalid @enderror"
                                       name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-lock"></i>
                                  </span>
                                </div>
                                <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control
                                    @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-lock"></i>
                                  </span>
                                </div>
                                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control
                                @error('password-confirm') is-invalid @enderror"
                                       name="password_confirmation" required autocomplete="new-password">

                                @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
