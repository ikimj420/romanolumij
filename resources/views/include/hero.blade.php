<section class="hero-wrap js-fullheight" style="background-image: url({!! asset('/storage/images/bg_1.jpg') !!});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row description js-fullheight align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <div class="text mb-5"></div>
                <div class="text">
                    <h4 class="mb-5 mt-2">{{ __('app.welcome') }}@auth{!! Auth::user()->name !!}@endauth</h4>
                </div>
            </div>
        </div>
    </div>
</section>
