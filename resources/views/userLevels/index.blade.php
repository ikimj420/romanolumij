@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/login.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>User Level</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Roles -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4">User Level</h2>
                    <div class="row">
                        @forelse($users as $user)
                            <div class="col-md-4 text-center">
                                <h2 class="heading-section mb-4">
                                    <small></small>
                                </h2>
                                <a href="/userLevel/{!! $user->id !!}-{!! \Illuminate\Support\Str::slug($user->username, '_') !!}">
                                    <div class="image-wrap">
                                        <img src="{!! asset('/storage/users/'.$user->avatar) !!}" alt="{!! $user->username !!}" class="rounded img-fluid image image-2 image-full">
                                        <div class="text">
                                            <div class="img"></div>
                                            <span class="position">{!! $user->username !!}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection