@extends('layouts.app')

@section('content')

    <!-- Hero -->
    @include('include.hero')

    <!-- Message -->
    @include('include.message')

    <!-- Poems Story Dictionary -->
    <section class="ftco-section ftco-section-2 bg-light" id="navigationTabs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="heading-section sm-12">Poems Stories Dictionary</h2>
                    <div class="tabulation tabulation2">
                        <div class="d-flex tabs border border-left-0 border-right-0 border-top-0 justify-content-center">
                            <div class="d-inline-block">
                                <ul class="nav nav-tabs border-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#poems">Poems</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#stories">Stories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#dictionary">Dictionary</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content border-0">
                            <div class="tab-pane container p-4 active text-center" id="poems">
                                <section class="ftco-section ftco-section-2 bg-light" id="cards">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                            <div class="text">
                                                                <div class="img img-2 round-circle" style="background-image: url(images/person-1.jpg);"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <h5 class="card-title mb-0 text-success">Author Name</h5>
                                                        <a href="/"><span class="position d-block mb-4">Title</span></a>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                            <div class="text">
                                                                <div class="img img-2 round-circle" style="background-image: url(images/person-1.jpg);"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <h5 class="card-title mb-0 text-success">Author Name</h5>
                                                        <a href="/"><span class="position d-block mb-4">Title</span></a>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                            <div class="text">
                                                                <div class="img img-2 round-circle" style="background-image: url(images/person-1.jpg);"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <h5 class="card-title mb-0 text-success">Author Name</h5>
                                                        <a href="/"><span class="position d-block mb-4">Title</span></a>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane container p-4 fade text-center" id="stories">
                                <section class="ftco-section ftco-section-2 bg-light" id="cards">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                            <div class="text">
                                                                <div class="img img-2 round-circle" style="background-image: url(images/person-1.jpg);"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <h5 class="card-title mb-0 text-success">Author Name</h5>
                                                        <a href="/"><span class="position d-block mb-4">Title</span></a>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                            <div class="text">
                                                                <div class="img img-2 round-circle" style="background-image: url(images/person-1.jpg);"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <h5 class="card-title mb-0 text-success">Author Name</h5>
                                                        <a href="/"><span class="position d-block mb-4">Title</span></a>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                            <div class="text">
                                                                <div class="img img-2 round-circle" style="background-image: url(images/person-1.jpg);"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <h5 class="card-title mb-0 text-success">Author Name</h5>
                                                        <a href="/"><span class="position d-block mb-4">Title</span></a>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane container p-4 fade text-center" id="dictionary">
                                <section class="ftco-section ftco-section-2 bg-light" id="cards">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <a href="/"><h5 class="card-title mb-0 text-success">Rom</h5></a>
                                                        <p class="card-text">body</p>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <a href="/"><h5 class="card-title mb-0 text-success">Rom</h5></a>
                                                        <p class="card-text">body</p>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="card text-center">
                                                    <div class="card-img">
                                                        <div class="image-wrap">
                                                            <img src="images/bg_3.jpg" alt="Round Image" class="rounded img-fluid image image-2 image-full">
                                                        </div>
                                                    </div>
                                                    <div class="card-body pb-5">
                                                        <a href="/"><h5 class="card-title mb-0 text-success">Rom</h5></a>
                                                        <p class="card-text">body</p>
                                                        <p class="card-text">body</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Images -->
    <section class="ftco-section" id="images">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-section mb-4"> Images</h2>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <h2 class="heading-section mb-4">
                                <small>Title Of The Album</small>
                            </h2>
                            <div class="image-wrap">
                                <img src="images/image-1.jpg" alt="Round Image" class="rounded img-fluid image image-2">
                                <div class="text">
                                    <div class="img" style="background-image: url(images/person.jpg);"></div>
                                    <span class="position">Authors Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h2 class="heading-section mb-4">
                                <small>Title Of The Album</small>
                            </h2>
                            <div class="image-wrap">
                                <img src="images/image-1.jpg" alt="Round Image" class="rounded img-fluid image image-2">
                                <div class="text">
                                    <div class="img" style="background-image: url(images/person.jpg);"></div>
                                    <span class="position">Authors Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h2 class="heading-section mb-4">
                                <small>Title Of The Album</small>
                            </h2>
                            <div class="image-wrap">
                                <img src="images/image-1.jpg" alt="Round Image" class="rounded img-fluid image image-2">
                                <div class="text">
                                    <div class="img" style="background-image: url(images/person.jpg);"></div>
                                    <span class="position">Authors Name</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
