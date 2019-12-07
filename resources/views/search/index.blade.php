@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/search.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Search - Rode</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search -->
    <section class="ftco-section ftco-section-2 bg-light" id="cards" style="min-height: 440px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card text-center">
                        <div class="card-img pt-5 col-md-12">
                            <div class="col-md-12">
                                <div class="form-group form-group-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="ion-ios-search"></i>
                                          </span>
                                        </div>
                                        <form role="search" method="get" class="form-control form-control-shadow">
                                            <input class="form-control" id="search" name="search" type="search" placeholder="Search - Rode" aria-label="Search" autocomplete="off">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="card-body pb-5">
                            <h3 id="display" class="card-title text-center"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
