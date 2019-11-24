@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    </div>

    <!-- Message -->
    @include('include.message')

    <!-- Add Button -->
    @auth
        @if(Auth::user()->Admin())
            <div class="container">
                <div class="row">
                    <div class="mt-3">
                        <a href="{!! route('history.create') !!}" class="btn btn-success"> Add New</a>
                    </div>
                </div>
            </div>
        @endif
    @endauth

    <!-- History -->
    <section class="ftco-section ftco-section-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 text-center">
                    <h2 class="heading-section mb-4 pb-md-3">
igg
                    </h2>
                    <p>
lku
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

