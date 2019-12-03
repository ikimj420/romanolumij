<div class="row">
    @forelse($poems as $poem)
        <div class="col-md-4 mb-2">
            <div class="card text-center">
                <div class="card-img">
                    <div class="image-wrap">
                        <a href="/poem/{!! $poem->id !!}-{!! \Illuminate\Support\Str::slug($poem->alav, '_') !!}">
                            <img src="{!! asset('/storage/poems/'.$poem->pics) !!}" alt="{!! $poem->title !!}" class="rounded img-fluid image image-2 image-full">
                        </a>
                        <div class="text">
                            <a href="/profile/{!! $poem->user['id'] !!}-{!! \Illuminate\Support\Str::slug( $poem->user['username'], '_') !!}">
                                <div class="img img-2 round-circle" style="background-image: url({!! asset('/storage/users/'.$poem->user['avatar']) !!});"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-5">
                    <a href="/profile/{!! $poem->user['id'] !!}-{!! \Illuminate\Support\Str::slug( $poem->user['username'], '_') !!}">
                        <h5 class="card-title mb-0 text-success">{!! $poem->user['username'] !!}</h5>
                    </a>
                    <a href="/poem/{!! $poem->id !!}-{!! \Illuminate\Support\Str::slug($poem->alav, '_') !!}">
                        <span class="position d-block mb-4">{!! $poem->alav !!}</span>
                        <p class="card-text">{!! Str::words($poem->djili, 9, ' ...') !!}</p>
                    </a>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>