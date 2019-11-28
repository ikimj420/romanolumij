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
                    <h2 class="heading-section sm-12">Poems Stories Dictionary</h2>
                    <div class="tabulation tabulation2">
                        <div class="d-flex tabs border border-left-0 border-right-0 border-top-0 justify-content-center">
                            <div class="d-inline-block">
                                <ul class="nav nav-tabs border-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#poems">Poems</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#stories">Stories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#dictionary">Dictionary</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content border-0">
                            <div class="tab-pane container p-4 active text-center" id="poems">
                                <section class="ftco-section ftco-section-2 bg-light" id="cards">
                                    <div class="container">
                                        <div class="row">
                                            @forelse($poems as $poem)
                                                <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="{!! asset('/storage/poems/'.$poem->pics) !!}" alt="{!! $poem->title !!}" class="rounded img-fluid image image-2 image-full">
                                                            <div class="text">
                                                                <a href="/profile/{!! $poem->user['id'] !!}">
                                                                    <div class="img img-2 round-circle" style="background-image: url({!! asset('/storage/users/'.$poem->user['avatar']) !!});"></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <a href="/profile/{!! $poem->user['id'] !!}">
                                                            <h5 class="card-title mb-0 text-success">{!! $poem->user['username'] !!}</h5>
                                                        </a>
                                                        <a href="/poem/{!! $poem->id !!}">
                                                            <span class="position d-block mb-4">{!! $poem->alav !!}</span>
                                                            <p class="card-text">{!! Str::words($poem->djili, 9, ' ...') !!}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane container p-4 fade text-center" id="stories">
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
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane container p-4 fade text-center" id="dictionary">
                                <section class="ftco-section ftco-section-2 bg-light" id="cards">
                                    <div class="container">
                                        <div class="row">
                                            @forelse($lexicons as $lexicon)
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <a href="/lexicon/{!! $lexicon->id !!}">
                                                                <img src="{!! asset('/storage/categories/'.$lexicon->category['pics']) !!}" alt="{!! $lexicon->eng !!}" class="rounded img-fluid image image-2 image-full">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <a href="/lexicon/{!! $lexicon->id !!}"><h5 class="card-title mb-0 text-success">{!! $lexicon->rom !!}</h5></a>
                                                        <p class="card-text">{!! $lexicon->ser !!}</p>
                                                        <p class="card-text">{!! $lexicon->eng !!}</p>
                                                    </div>
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
