@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/story.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>@if (App::isLocale('rom'))Paramića - {!! $story->alav !!}  @else Story - {!! $story->title !!} @endif</span></h1>
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
                            @include('stories.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('stories.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Friends -->
    <section class="ftco-section" id="typography">
        <div class="container">
            @if (App::isLocale('rom'))
                @include('stories.story.romS')
            @else
                @include('stories.story.engS')
            @endif
        </div>
    </section>

@endsection
