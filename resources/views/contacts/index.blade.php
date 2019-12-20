@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/contact.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>{{ __('app.contact') }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Button -->
    @auth
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="mt-3">
                        @include('contacts.modal.add')
                    </div>
                </div>
            </div>
        </section>
    @endauth

    <!-- History -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (App::isLocale('rom'))
                        @include('contacts.contact.rom')
                    @else
                        @include('contacts.contact.eng')
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- All unread mail -->
    @auth
        @if(Auth::user()->Admin())
            <section class="ftco-section" id="images">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="heading-section mb-4"></h2>
                            <div class="row">
                                @forelse($contacts as $contact)
                                    <div class="col-md-4 text-center"><a href="{!! $contact->pathTitle() !!}">
                                            <h2 class="heading-section mb-4">
                                                <small></small>
                                            </h2>
                                        </a>
                                        <div class="image-wrap">
                                            <a href="{!! $contact->pathTitle() !!}">
                                                <img src="{!! asset('/storage/svg/contact.svg') !!}" alt="{!! $contact->subject !!}" class="rounded img-fluid image image-2">
                                            </a>
                                            <div class="text">
                                                <a href="{!! $contact->pathProfile() !!}">
                                                    <div class="img" style="background-image: url({!! $contact->userPics() !!});"></div>
                                                    <span class="position">{!! $contact->user['username'] !!}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

@endsection
