@extends('layouts.app')
@section('content')
<section class="ftco-section ftco-section-2 section-signup page-header img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 mb-4 mb-md-0">
                <div class="card card-login py-4">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title">{{ __('app.before') }}</h4>
                        <h4 class="card-title">{{ __('app.ifReceive') }},</h4>
                    </div>
                    @if (session('resent'))
                        <section class="ftco-section" id="notifications">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <div class="container">
                                                <div class="d-flex">
                                                    <div class="alert-icon">
                                                        <i class="ion-ios-checkmark-circle"></i>
                                                    </div>
                                                    <p class="mb-0 ml-2">{{ __('app.fresh') }}</p>
                                                </div>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="ion-ios-close"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

                    <form class="form-login" method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">{{ __('app.verify') }}</h4>
                        </div>

                        <div class="card-body p-4">
                            <div class="input-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('app.another') }}
                                    </button>.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
