<div class="row">
    @forelse($poems as $poem)
        <div class="col-md-3 mb-2">
            <div class="card text-center">
                <div class="card-img">
                    <div class="image-wrap">
                        <a href="{!! $poem->pathAlav() !!}">
                            <img src="{!! $poem->poemPics() !!}" alt="{!! $poem->title !!}" class="rounded img-fluid image image-2 image-full">
                        </a>
                        <div class="text">
                            <a href="{!! $poem->pathProfile() !!}">
                                <div class="img img-2 round-circle" style="background-image: url({!! $poem->userPics() !!});"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-5">
                    <a href="{!! $poem->pathProfile() !!}">
                        <h5 class="card-title mb-0 text-success">{!! $poem->user['username'] !!}</h5>
                    </a>
                    <a href="{!! $poem->pathAlav() !!}">
                        <span class="position d-block mb-4">{!! $poem->alav !!}</span>
                        <p class="card-text">{!! Str::words($poem->djili, 9, ' ...') !!}</p>
                    </a>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>
