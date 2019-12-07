@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/story.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>{{ __('app.story') }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stories -->
    <section class="ftco-section ftco-section-2 bg-light" id="cards">
        <div class="container">
            @if (App::isLocale('rom'))
                @include('stories.story.rom')
            @else
                @include('stories.story.eng')
            @endif
            {!! $stories->onEachSide(1)->links() !!}
        </div>
    </section>


@endsection
