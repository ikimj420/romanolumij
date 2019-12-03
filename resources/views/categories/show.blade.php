@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Category - {!! $category->name !!}</span></h1>
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
                            @include('categories.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('categories.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Category -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="image-wrap">
                        <img src="{!! asset('/storage/categories/'.$category->pics) !!}" alt="{!! $category->name !!}" class="rounded img-fluid image image-2">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Name</span>
                        <div class="blockquote">
                            <p>
                                {!! $category->name !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Varnanipe</span>
                        <div class="blockquote">
                            <p>
                                {!! $category->varnanipe !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Description</span>
                        <div class="blockquote">
                            <p>
                                {!! $category->desc !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection