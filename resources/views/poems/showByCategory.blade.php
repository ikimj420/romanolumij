@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>{{ __('app.poem') }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Poems -->
    <section class="ftco-section ftco-section-2 bg-light" id="cards">
        <div class="container">
            @if (App::isLocale('rom'))
                @include('poems.poem.rom')
            @else
                @include('poems.poem.eng')
            @endif
            {!! $poems->onEachSide(1)->links() !!}
        </div>
    </section>

@endsection