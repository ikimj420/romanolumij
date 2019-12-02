@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>{{ __('app.album') }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('albums.modal.add')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Images -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4"> Albums</h2>
                    <div class="row">
                        @forelse($albums as $album)
                            <div class="col-md-4 text-center">
                                <h2 class="heading-section mb-4">
                                    <small>{!! $album->name !!}</small>
                                </h2>
                                <div class="image-wrap">
                                    <a href="/album/{!! $album->id !!}">
                                        <img src="{!! asset('/storage/albums/'.$album->pics) !!}" alt="{!! $album->name !!}" class="rounded img-fluid image image-2">
                                    </a>
                                    <div class="text">
                                        <a href="/profile/{!! $album->user['id'] !!}">
                                            <div class="img" style="background-image: url({!! '/storage/users/'.$album->user['avatar'] !!});"></div>
                                            <span class="position">{!! $album->user['username'] !!}</span>
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


@endsection