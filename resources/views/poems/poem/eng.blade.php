<div class="row">
    @forelse($poems as $poem)
        <div class="col-md-4 mb-2">
            <div class="card text-center">
                <div class="card-img">
                    <div class="image-wrap">
                        <img src="{!! asset('/storage/poems/'.$poem->pics) !!}" alt="{!! $poem->title !!}" class="rounded img-fluid image image-2 image-full">
                        <div class="text">
                            <a href="/profile/{!! $poem->user['id'] !!}">
                                <div class="img img-2 round-circle" style="background-image: url({!! asset('/storage/users/'.$poem->user['avatar']) !!});"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-5">
                    <a href="/profile/{!! $poem->user['id'] !!}">
                        <h5 class="card-title mb-0 text-success">{!! $poem->user['username'] !!}</h5>
                    </a>
                    <a href="/poem/{!! $poem->id !!}">
                        <span class="position d-block mb-4">{!! $poem->title !!}</span>
                        <p class="card-text">{!! Str::words($poem->poem, 9, ' ...') !!}</p>
                    </a>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>