@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/profile.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Profile {!! $user->name !!}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Delete Button -->
    @auth
        @if(Auth::id() === $user->id)
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('profiles.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('profiles.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- User -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="image-wrap">
                        <img src="{!! $user->userPics() !!}" alt="{!! $user->name !!}" class="rounded img-fluid image image-2">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.userL') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->role['userLevel'] !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.name') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->name !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.username') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->username !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.email') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->email !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.bDate') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->birthDate !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.site') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->site !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.phones') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->phones !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.street') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->street !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.city') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->city !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.state') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->state !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('profile.bio') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->bio !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- albums -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4">{{ __('app.album') }}</h2>
                    <div class="row">
                        @forelse($user->albums as $album)
                            <div class="col-md-4 text-center"><a href="{!! $album->pathTitle() !!}">
                                    <h2 class="heading-section mb-4">
                                        <small>{!! $album->name !!}</small>
                                    </h2>
                                </a>
                                <div class="image-wrap">
                                    <a href="{!! $album->pathTitle() !!}">
                                        <img src="{!! $album->albumPics() !!}" alt="{!! $album->name !!}" class="rounded img-fluid image image-2">
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

    <!-- blog -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4">{{ __('app.blogs') }}</h2>
                    <div class="row">
                        @forelse($user->blogs as $blog)
                            <div class="col-md-4 text-center"><a href="{!! $blog->pathTitle() !!}">
                                    <h2 class="heading-section mb-4">
                                        <small>{!! $blog->title !!}</small>
                                    </h2>
                                </a>
                                <div class="image-wrap">
                                    <a href="{!! $blog->pathTitle() !!}">
                                        <img src="{!! $blog->blogPics() !!}" alt="{!! $blog->title !!}" class="rounded img-fluid image image-2">
                                    </a>
                                    <div class="text">
                                        <a href="{!! $blog->pathProfile() !!}">
                                            <div class="img" style="background-image: url({!! $blog->userPics() !!});"></div>
                                            <span class="position">{!! $blog->user['username'] !!}</span>
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

    <!-- poems -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4">{{ __('app.poem') }}</h2>
                    <div class="row">
                        @forelse($user->poems as $poem)
                            <div class="col-md-4 text-center"><a href="@if(App::isLocale('rom')){!! $poem->pathAlav() !!}@else{!! $poem->pathTitle() !!}@endif">
                                    <h2 class="heading-section mb-4">
                                        <small>@if(App::isLocale('rom')){!! $poem->alav !!}@else{!! $poem->title !!}@endif</small>
                                    </h2>
                                </a>
                                <div class="image-wrap">
                                    <a href="@if(App::isLocale('rom')){!! $poem->pathAlav() !!}@else{!! $poem->pathTitle() !!}@endif">
                                        <img src="{!! $poem->poemPics() !!}" alt="{!! $poem->title !!}" class="rounded img-fluid image image-2">
                                    </a>
                                    <div class="text">
                                        <a href="{!! $poem->pathProfile() !!}">
                                            <div class="img" style="background-image: url({!! $poem->userPics() !!});"></div>
                                            <span class="position">{!! $poem->user['username'] !!}</span>
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

    <!-- stories -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4">{{ __('app.story') }}</h2>
                    <div class="row">
                        @forelse($user->stories as $story)
                            <div class="col-md-4 text-center"><a href="@if(App::isLocale('rom')){!! $story->pathAlav() !!}@else{!! $story->pathTitle() !!}@endif">
                                    <h2 class="heading-section mb-4">
                                        <small>@if(App::isLocale('rom')){!! $story->alav !!}@else{!! $story->title !!}@endif</small>
                                    </h2>
                                </a>
                                <div class="image-wrap">
                                    <a href="@if(App::isLocale('rom')){!! $story->pathAlav() !!}@else{!! $story->pathTitle() !!}@endif">
                                        <img src="{!! $story->storyPics() !!}" alt="{!! $story->title !!}" class="rounded img-fluid image image-2">
                                    </a>
                                    <div class="text">
                                        <a href="{!! $story->pathProfile() !!}">
                                            <div class="img" style="background-image: url({!! $story->userPics() !!});"></div>
                                            <span class="position">{!! $story->user['username'] !!}</span>
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
