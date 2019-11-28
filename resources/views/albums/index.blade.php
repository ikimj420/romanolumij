@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Albums</span></h1>
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

    <!-- Roles -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4">Albums</h2>
                    <div class="row">
                        @forelse($albums as $album)
                            <div class="col-md-4 text-center">
                                <h2 class="heading-section mb-4">
                                    <small></small>
                                </h2>
                                <a href="/album/{!! $album->id !!}">
                                <div class="image-wrap">
                                    <img src="{!! asset('/storage/albums/'.$album->pics) !!}" alt="{!! $album->name !!}" class="img-raised rounded-circle thumbnail img-fluid image">
                                    <div class="text">
                                        <div class="img"></div>
                                        <span class="position">{!! $album->name !!}</span>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    {!! $albums->onEachSide(1)->links() !!}
                </div>
            </div>
        </div>
    </section>


@endsection