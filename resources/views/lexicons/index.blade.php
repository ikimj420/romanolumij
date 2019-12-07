@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/lexicon.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>{{ __('app.lexicon') }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('lexicons.modal.add')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Lexicons -->
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
            {!! $lexicons->onEachSide(1)->links() !!}
        </div>
    </section>


@endsection
