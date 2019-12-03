@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Album - {!! $album->name !!}</span></h1>
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
                            @include('albums.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('albums.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Albums -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="image-wrap">
                        <img src="{!! asset('/storage/albums/'.$album->pics) !!}" alt="{!! $album->name !!}" class="rounded img-fluid image image-2 image-full">
                        <div class="text">
                            <a href="/profile/{!! $album->user['id'] !!}-{!! \Illuminate\Support\Str::slug( $album->user['username'], '_') !!}">
                                <div class="img" style="background-image: url({!! asset('/storage/users/'.$album->user['avatar']) !!});"></div>
                                <span class="position">{!! $album->user['username'] !!}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Album Name</span>
                        <div class="blockquote">
                            <p>
                                {!! $album->name !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Description</span>
                        <div class="blockquote">
                            <p>
                                {!! $album->desc !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Categoria</span>
                        <div class="blockquote">
                            <h3>
                                <a href="/">{!! $album->category['name'] !!}</a>
                            </h3>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Tags</span>
                        <div class="blockquote">
                            @forelse($album->tags as $tag)
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
                            @comments(['model' => $album])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('images.modal.add')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Images -->
    <section class="ftco-section" id="typography">
        <div class="container">
            @forelse($album->images as $image)
                <div class="row">
                <div class="col-md-4 text-center">
                    <div class="image-wrap">
                        <a href="/image/{!! $image->id !!}-{!! \Illuminate\Support\Str::slug( $image->name, '_') !!}">
                            <img src="{!! asset('/storage/photos/'.$image->pics) !!}" alt="{!! $image->name !!}" class="rounded img-fluid image image-2 image-full">
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Image Name</span>
                        <div class="blockquote">
                            <p>
                                {!! $image->name !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Description</span>
                        <div class="blockquote">
                            <p>
                                {!! $image->desc !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </section>

@endsection