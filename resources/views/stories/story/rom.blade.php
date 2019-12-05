<div class="row">
    @forelse($stories as $story)
        <div class="col-md-4 mb-2">
            <div class="card text-center">
                <div class="card-img">
                    <div class="image-wrap">
                        <a href="{!! $story->pathAlav() !!}">
                            <img src="{!! $story->storyPics() !!}" alt="{!! $story->title !!}" class="rounded img-fluid image image-2 image-full">
                        </a>
                        <div class="text">
                            <a href="{!! $story->pathProfile() !!}">
                                <div class="img img-2 round-circle" style="background-image: url({!! $story->userPics() !!});"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-5">
                    <a href="{!! $story->pathProfile() !!}">
                        <h5 class="card-title mb-0 text-success">{!! $story->user['username'] !!}</h5>
                    </a>
                    <a href="{!! $story->pathAlav() !!}">
                        <span class="position d-block mb-4">{!! $story->alav !!}</span>
                        <p class="card-text">{!! Str::words($story->paramica, 9, ' ...') !!}</p>
                    </a>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>