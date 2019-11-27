@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/login.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Profile {!! $user->name !!}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Delete Button -->
    @auth
        @if(Auth::id() === $user->id)
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('profiles.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('profiles.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- User -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="image-wrap">
                        <img src="{!! asset('/storage/users/'.$user->avatar) !!}" alt="{!! $user->name !!}" class="img-raised rounded-circle thumbnail img-fluid image">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">User Level</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->role['userLevel'] !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Name</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->name !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Username</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->username !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Email</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->email !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">BirthDate</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->birthDate !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Phones</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->phones !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Street</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->street !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">City</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->city !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">State</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->state !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Biography</span>
                        <div class="blockquote">
                            <p>
                                {!! $user->bio !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection