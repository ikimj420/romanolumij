@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Image - {!! $image->name !!}</span></h1>
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
                            @include('images.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('images.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Image -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="image-wrap">
                        <img src="{!! $image->imagePics() !!}" alt="{!! $image->name !!}" class="rounded img-fluid image image-2">
                        <div class="text">
                            <a href="{!! $image->pathProfile() !!}">
                                <div class="img" style="background-image: url({!! $image->userPics() !!});"></div>
                                <span class="position">{!! $image->user['username'] !!}</span>
                            </a>
                        </div>
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
        </div>
    </section>

@endsection