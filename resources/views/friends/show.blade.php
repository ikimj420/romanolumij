@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Friend</span></h1>
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
                            @include('friends.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('friends.modal.delete')
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
                        <img src="{!! asset('/storage/friends/'.$friend->pics) !!}" alt="{!! $friend->title !!}" class="img-raised rounded-circle thumbnail img-fluid image">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Alav</span>
                        <div class="blockquote">
                            <p>
                                {!! $friend->alav !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Title</span>
                        <div class="blockquote">
                            <p>
                                {!! $friend->title !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">URL Site</span>
                        <a href="{!! $friend->url !!}" target="_blank">
                            <div class="blockquote">
                                <p>
                                    {!! $friend->title !!}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection