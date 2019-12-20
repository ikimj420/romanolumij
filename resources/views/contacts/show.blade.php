@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/friend.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Contact Mail</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Delete Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('contacts.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('contacts.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Friends -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="image-wrap">
                        <img src="{!! asset('/storage/svg/contact.svg') !!}" alt="{!! $contact->subject !!}" class="rounded img-fluid image image-2 image-full">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Subject</span>
                        <div class="blockquote">
                            <p>
                                {!! $contact->subject !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Message</span>
                        <div class="blockquote">
                            <p>{!! $contact->message !!}</p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">User</span>
                        <div class="blockquote">
                            <a href="{!! $contact->pathProfile() !!}">
                                <p>{!! $contact->user['username'] !!}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
