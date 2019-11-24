@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <section class="ftco-section" id="notifications">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <div class="container">
                                <div class="d-flex">
                                    <div class="alert-icon">
                                        <i class="ion-ios-information-circle-outline"></i>
                                    </div>
                                    <p class="mb-0 ml-2">{!! $error !!}</p>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="ion-ios-close"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif

@if ($message = Session::get('success'))
    <section class="ftco-section" id="notifications">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <div class="container">
                            <div class="d-flex">
                                <div class="alert-icon">
                                    <i class="ion-ios-checkmark-circle"></i>
                                </div>
                                <p class="mb-0 ml-2">{!! $message !!}</p>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ion-ios-close"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if ($message = Session::get('error'))
    <section class="ftco-section" id="notifications">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <div class="container">
                            <div class="d-flex">
                                <div class="alert-icon">
                                    <i class="ion-ios-information-circle-outline"></i>
                                </div>
                                <p class="mb-0 ml-2">{!! $message !!}</p>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ion-ios-close"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if ($message = Session::get('warning'))
    <section class="ftco-section" id="notifications">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        <div class="container">
                            <div class="d-flex">
                                <div class="alert-icon">
                                    <i class="ion-ios-warning"></i>
                                </div>
                                <p class="mb-0 ml-2">{!! $message !!}</p>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ion-ios-close"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if ($message = Session::get('info'))
    <section class="ftco-section" id="notifications">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <div class="container">
                            <div class="d-flex">
                                <div class="alert-icon">
                                    <i class="ion-ios-information-circle-outline"></i>
                                </div>
                                <p class="mb-0 ml-2">{!! $message !!}</p>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ion-ios-close"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if ($errors->any())
    <section class="ftco-section" id="notifications">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <div class="container">
                            <div class="d-flex">
                                <div class="alert-icon">
                                    <i class="ion-ios-information-circle-outline"></i>
                                </div>
                                <p class="mb-0 ml-2">@dd($errors->any())</p>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ion-ios-close"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
