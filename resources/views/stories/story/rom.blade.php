<div class="row">
    @forelse($stories as $story)
        <div class="col-md-4 mb-2">
            <div class="card text-center">
                <div class="card-img">
                    <div class="image-wrap">
                        <img src="{!! asset('/storage/stories/'.$story->pics) !!}" alt="{!! $story->title !!}" class="rounded img-fluid image image-2 image-full">
                        <div class="text">
                            <a href="/profile/{!! $story->user['id'] !!}">
                                <div class="img img-2 round-circle" style="background-image: url({!! asset('/storage/users/'.$story->user['avatar']) !!});"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-5">
                    <a href="/profile/{!! $story->user['id'] !!}">
                        <h5 class="card-title mb-0 text-success">{!! $story->user['username'] !!}</h5>
                    </a>
                    <a href="/story/{!! $story->id !!}">
                        <span class="position d-block mb-4">{!! $story->alav !!}</span>
                        <p class="card-text">{!! Str::words($story->paramica, 9, ' ...') !!}</p>
                    </a>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>