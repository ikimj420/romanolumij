@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Poem - {!! $poem->alav !!}</span></h1>
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
                            @include('poems.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('poems.modal.delete')
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
                        <small>{!! $poem->alav !!}</small>
                    </h2>
                    <div class="image-wrap">
                        <img src="{!! asset('/storage/poems/'.$poem->pics) !!}" alt="{!! $poem->title !!}" class="rounded img-fluid image image-2">
                        <div class="text">
                            <div class="img" style="background-image: url({!! asset('/storage/users/'.$poem->user['avatar']) !!});"></div>
                            <span class="position"><a href="/profile/{!! $poem->user['id'] !!}">{!! $poem->user['username'] !!}</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Djili</span>
                        <div class="blockquote">
                            <p>
                                {!! $poem->djili !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Varnanipe</span>
                        <div class="blockquote">
                            <p>
                                {!! $poem->varnanipe !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Categoria</span>
                        <div class="blockquote">
                            <h3>
                                <a href="/">{!! $poem->category['name'] !!}</a>
                            </h3>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Tags</span>
                        <div class="blockquote">
                            @forelse($poem->tags as $tag)
                                <a href="/tag/tags/{{ $tag }}">
                                    <span>#{!! $tag->normalized !!} </span>
                                </a>
                            @empty
                                <span> #</span>
                            @endforelse
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Comment</span>
                        <div class="blockquote">
                            @comments(['model' => $poem])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection