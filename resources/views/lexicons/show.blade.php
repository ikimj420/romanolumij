@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/lexicon.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Lexicon - {!! $lexicon->rom !!}</span></h1>
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
                            @include('lexicons.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('lexicons.modal.delete')
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
                    <div class="image-wrap mb-3">
                        <img src="{!! $lexicon->lexiconPics() !!}" alt="{!! $lexicon->eng !!}" class="rounded img-fluid image image-2">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Romano Lafi</span>
                        <div class="blockquote">
                            <p>
                                {!! $lexicon->rom !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Srpska Reč</span>
                        <div class="blockquote">
                            <p>
                                {!! $lexicon->ser !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Word English</span>
                        <div class="blockquote">
                            <p>
                                {!! $lexicon->eng !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Categoria</span>
                        <div class="blockquote">
                            <a href="{!! $lexicon->pathLexiconCategory() !!}">
                                <img src="{!! $lexicon->lexiconCategoryPics() !!}" alt="{!! $lexicon->category['name'] !!}" class="image img-fluid img-2" style="width: 25%;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
