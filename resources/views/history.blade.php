@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/images/romani.jpg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    </div>

    <!-- Message -->
    @include('include.message')

    <!-- History -->
    <section class="ftco-section ftco-section-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 text-center">
                    <h2 class="heading-section mb-4 pb-md-3">
                        Romani Istorija
                    </h2>
                    <p>The kit comes with three pre-built pages to help you get started faster.
                        You can change the text and images and you're good to go. More importantly,
                        looking at them will give you a picture of what you can built with this powerful kit.
                        The kit comes with three pre-built pages to help you get started faster.
                        You can change the text and images and you're good to go. More importantly,
                        looking at them will give you a picture of what you can built with this powerful kit.
                        The kit comes with three pre-built pages to help you get started faster.
                        You can change the text and images and you're good to go. More importantly,
                        looking at them will give you a picture of what you can built with this powerful kit.
                        The kit comes with three pre-built pages to help you get started faster.
                        You can change the text and images and you're good to go. More importantly,
                        looking at them will give you a picture of what you can built with this powerful kit.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

