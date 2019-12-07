@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/blog.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>{!! $blog->title !!}</span></h1>
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
                            @include('blogs.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('blogs.modal.delete')
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
                        <small>{!! $blog->title !!}</small>
                    </h2>
                    <div class="image-wrap">
                        <img src="{!! $blog->blogPics() !!}" alt="{!! $blog->title !!}" class="rounded img-fluid image image-2">
                        <div class="text">
                            <a href="{!! $blog->pathProfile() !!}">
                                <div class="img" style="background-image: url({!! $blog->userPics() !!});"></div>
                                <span class="position">{!! $blog->user['username'] !!}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Blog</span>
                        <div class="blockquote">
                            <p>
                                {!! $blog->title !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Text</span>
                        <div class="blockquote">
                            <p>
                                {!! $blog->body !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Tags</span>
                        <div class="blockquote">
                            @forelse($blog->tags as $tag)
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
                            @comments(['model' => $blog])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
