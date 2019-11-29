@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Stories</span></h1>
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
                            @include('stories.modal.add')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Stories -->
    <section class="ftco-section ftco-section-2 bg-light" id="cards">
        <div class="container">
            <div class="row">
                @forelse($stories as $story)
                    <div class="col-md-4 mb-2">
                        <div class="card text-center">
                            <div class="card-img">
                                <div class="image-wrap">
                                    <img src="{!! asset('/storage/stories/'.$story->pics) !!}" alt="{!! $story->title !!}" class="rounded img-fluid image image-2 image-full">
                                    <div class="text">
                                        <a href="/profile/{!! $story->user['id'] !!}">
                                            <div class="img img-2 round-circle" style="background-image: url({!! asset('/storage/users/'.$story->user['avatar']) !!});"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pb-5">
                                <a href="/profile/{!! $story->user['id'] !!}">
                                    <h5 class="card-title mb-0 text-success">{!! $story->user['username'] !!}</h5>
                                </a>
                                <a href="/story/{!! $story->id !!}">
                                    <span class="position d-block mb-4">{!! $story->alav !!}</span>
                                    <p class="card-text">{!! Str::words($story->paramica, 9, ' ...') !!}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            {!! $stories->onEachSide(1)->links() !!}
        </div>
    </section>


@endsection