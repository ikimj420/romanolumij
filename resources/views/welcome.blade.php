@extends('layouts.app')

@section('content')

    <!-- Hero -->
    @include('include.hero')

    <!-- Message -->
    @include('include.message')

    <!-- Poems Story Dictionary -->
    <section class="ftco-section ftco-section-2 bg-light" id="navigationTabs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="heading-section sm-12">{{ __('app.psd') }}</h2>
                    <div class="tabulation tabulation2">
                        <div class="d-flex tabs border border-left-0 border-right-0 border-top-0 justify-content-center">
                            <div class="d-inline-block">
                                <ul class="nav nav-tabs border-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#poems">{{ __('app.poem') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#stories">{{ __('app.story') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#dictionary">{{ __('app.lexicon') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content border-0">
                            <div class="tab-pane container p-4 active text-center" id="poems">
                                <section class="ftco-section ftco-section-2 bg-light" id="cards">
                                    <div class="container">
                                        @if (App::isLocale('rom'))
                                            @include('poems.poem.rom')
                                        @else
                                            @include('poems.poem.eng')
                                        @endif
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane container p-4 fade text-center" id="stories">
                                <section class="ftco-section ftco-section-2 bg-light" id="cards">
                                    <div class="container">
                                        @if (App::isLocale('rom'))
                                            @include('stories.story.rom')
                                        @else
                                            @include('stories.story.eng')
                                        @endif
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane container p-4 fade text-center" id="dictionary">
                                <section class="ftco-section ftco-section-2 bg-light" id="cards">
                                    <div class="container">
                                        <div class="row">
                                            @forelse($lexicons as $lexicon)
                                            <div class="col-md-3 mb-2">
                                                <div class="card text-center">
                                                    <a href="{!! $lexicon->pathTitle() !!}">
                                                        <div class="card-img">
                                                            <div class="image-wrap">
                                                                <img src="{!! $lexicon->lexiconPics() !!}" alt="{!! $lexicon->eng !!}" class="rounded img-fluid image image-2 image-full">
                                                            </div>
                                                        </div>
                                                        <div class="card-body pb-5">
                                                            <h5 class="card-title mb-0 text-success">{!! $lexicon->rom !!}</h5>
                                                            <p class="card-text">{!! $lexicon->ser !!}</p>
                                                            <p class="card-text">{!! $lexicon->eng !!}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Images -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4">{{ __('app.album') }}</h2>
                    <div class="row">
                        @forelse($albums as $album)
                            <div class="col-md-3 text-center">
                                <a href="{!! $album->pathTitle() !!}">
                                    <h2 class="heading-section mb-4">
                                        <small>{!! $album->name !!}</small>
                                    </h2>
                                </a>
                            <div class="image-wrap">
                                <a href="{!! $album->pathTitle() !!}">
                                    <img src="{!! $album->albumPics() !!}" alt="{!! $album->name !!}" class="rounded img-fluid image image-2 image-full">
                                </a>
                                <div class="text">
                                <a href="{!! $album->pathProfile() !!}">
                                    <div class="img" style="background-image: url({!! $album->userPics() !!});"></div>
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


    <!-- Popular Brands-->
    <section class="bg-faded pt-3 pb-3">
        <div class="container">
            <h3 class="text-center mb-3 pb-2">Amare Amala</h3>
            <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }"><img class="d-block w-110 opacity-75 m-auto" src="/storage/svg/blog.svg" alt="Adidas"><img class="d-block w-110 opacity-75 m-auto" src="/storage/svg/blog.svg" alt="Brooks"><img class="d-block w-110 opacity-75 m-auto" src="/storage/svg/blog.svg" alt="Valentino"><img class="d-block w-110 opacity-75 m-auto" src="/storage/svg/blog.svg" alt="Nike"><img class="d-block w-110 opacity-75 m-auto" src="/storage/svg/blog.svg" alt="Puma"><img class="d-block w-110 opacity-75 m-auto" src="/storage/svg/blog.svg" alt="New Balance"><img class="d-block w-110 opacity-75 m-auto" src="/storage/svg/blog.svg" alt="Dior"></div>
        </div>
    </section>

@endsection
