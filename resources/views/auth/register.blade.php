@extends('layouts.app')
@section('content')
<section class="ftco-section ftco-section-2 section-signup page-header img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 mb-4 mb-md-0">
                <div class="card card-login py-4">
                    <form class="form-login" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">{{ __('app.register') }}</h4>
                        </div>

                        <div class="card-body p-4">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-contact"></i>
                                  </span>
                                </div>
                                <input id="name" placeholder="{{ __('app.fullName') }}" type="text" class="form-control
                                    @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-contact"></i>
                                  </span>
                                </div>
                                <input id="username" placeholder="{{ __('app.username') }}" type="text" class="form-control
                                    @error('username') is-invalid @enderror"
                                       name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-paper-plane"></i>
                                  </span>
                                </div>
                                <input id="email" placeholder="{{ __('app.email') }}" type="email" class="form-control
                                    @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-lock"></i>
                                  </span>
                                </div>
                                <input id="password" type="password" placeholder="{{ __('app.password') }}" class="form-control
                                    @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-lock"></i>
                                  </span>
                                </div>

                                <input id="password-confirm" type="password" placeholder="{{ __('app.confPassword') }}" class="form-control
                                    @error('password-confirm') is-invalid @enderror"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="input-group mb-3">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                        </div>

                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('app.register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
