@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>{{ __('app.blog') }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Poems -->
    <section class="ftco-section ftco-section-2 bg-light" id="cards">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-8 mb-6 mb-md-0">
                    <div class="card card-login py-4">
                        <div class="card-body p-4">
                            <p>
                                {{ __('contact.text') }}
                            </p>
                        </div>
                        <form class="form-login" method="POST" action="/contact">
                            @csrf
                            <div class="card-body p-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="ion-ios-share"></i> </span>
                                    </div>
                                    <input id="subjects" type="text" placeholder="{{ __('contact.sub') }}" class="form-control" name="subjects" value="{{ old('subjects') ? : old('subjects') }}" required autocomplete="subjects" autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="ion-ios-contact"></i> </span>
                                    </div>
                                    <input id="name" type="text" placeholder="{{ __('contact.name') }}" class="form-control" name="name" value="{{ old('name') ? : old('name') }}" required autocomplete="name" autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="ion-ios-paper-plane"></i> </span>
                                    </div>
                                    <input id="email" type="email" placeholder="{{ __('contact.email') }}" class="form-control" name="email" value="{{ old('email') ? : old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="ion-ios-create"></i> </span>
                                    </div>
                                    <textarea class="form-control" name="message" id="message" required autocomplete="message" autofocus>Message</textarea>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary"> {{ __('contact.send') }} </button>
                            </div>

                            <div class="toggle-button-cover mb-3"></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection