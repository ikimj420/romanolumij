@extends('layouts.app')
@section('content')
<section class="ftco-section ftco-section-2 section-signup page-header img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 mb-4 mb-md-0">
                <div class="card card-login py-4">
                    <form class="form-login" method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">{{ __('auth.confirm') }}</h4>
                            <p>{{ __('auth.pConfirm') }}</p>
                        </div>

                        <div class="card-body p-4">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-lock"></i>
                                  </span>
                                </div>
                                <input id="password" type="password" placeholder="{{ __('app.password') }}" class="form-control
                                      @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('app.confPassword') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('app.forgetPassword') }}
                                </a>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
