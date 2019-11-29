@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Tags</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Albums -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-3s">{{ __('button.albums') }}</h2>
                    <div class="row">
                        @forelse($albums as $album)
                            <div class="col-md-4 text-center mb-3">
                                <h2 class="heading-section mb-4">
                                    <small></small>
                                </h2>
                                <a href="/album/{!! $album->id !!}">
                                    <div class="image-wrap">
                                        <img src="{!! asset('/storage/albums/'.$album->pics ) !!}" alt="{!! $album->name !!}" class="img-raised rounded-circle thumbnail img-fluid image">
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
                </div>
            </div>
        </div>
    </section>

    <!-- Poems -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-3s">{{ __('button.poems') }}</h2>
                    <div class="row">
                        @forelse($poems as $poem)
                            <div class="col-md-4 text-center mb-3">
                                <h2 class="heading-section mb-4">
                                    <small></small>
                                </h2>
                                <a href="/poem/{!! $poem->id !!}">
                                    <div class="image-wrap">
                                        <img src="{!! asset('/storage/poem/'.$poem->alav ) !!}" alt="{!! $poem->title !!}" class="img-raised rounded-circle thumbnail img-fluid image">
                                        <div class="text">
                                            <div class="img"></div>
                                            <span class="position">{!! $poem->alav !!}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stories -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-3s">{{ __('button.stories') }}</h2>
                    <div class="row">
                        @forelse($stories as $story)
                            <div class="col-md-4 text-center mb-3">
                                <h2 class="heading-section mb-4">
                                    <small></small>
                                </h2>
                                <a href="/story/{!! $story->id !!}">
                                    <div class="image-wrap">
                                        <img src="{!! asset('/storage/stories/'.$story->pics ) !!}" alt="{!! $story->title !!}" class="img-raised rounded-circle thumbnail img-fluid image">
                                        <div class="text">
                                            <div class="img"></div>
                                            <span class="position">{!! $story->alav !!}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection