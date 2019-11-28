@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Story - {!! $story->alav !!}</span></h1>
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
                            @include('stories.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('stories.modal.delete')
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
                    <h2 class="heading-section mb-4">
                        <small>{!! $story->alav !!}</small>
                    </h2>
                    <div class="image-wrap">
                        <img src="{!! asset('/storage/stories/'.$story->pics) !!}" alt="{!! $story->title !!}" class="rounded img-fluid image image-2">
                        <div class="text">
                            <div class="img" style="background-image: url({!! asset('/storage/users/'.$story->user['avatar']) !!});"></div>
                            <span class="position"><a href="/profile/{!! $story->user['id'] !!}">{!! $story->user['username'] !!}</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Paramića</span>
                        <div class="blockquote">
                            <p>
                                {!! $story->djili !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Varnanipe</span>
                        <div class="blockquote">
                            <p>
                                {!! $story->varnanipe !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Categoria</span>
                        <div class="blockquote">
                            <h3>
                                <a href="/">{!! $story->category['name'] !!}</a>
                            </h3>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Tags</span>
                        <div class="blockquote">
                            <span>#tag</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection