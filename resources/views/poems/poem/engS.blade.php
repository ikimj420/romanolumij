<div class="row">
    <div class="col-md-4 text-center">
        <h2 class="heading-section mb-4">
            <small>{!! $poem->title !!}</small>
        </h2>
        <div class="image-wrap">
            <img src="{!! asset('/storage/poems/'.$poem->pics) !!}" alt="{!! $poem->title !!}" class="rounded img-fluid image image-2">
            <div class="text">
                <div class="img" style="background-image: url({!! asset('/storage/users/'.$poem->user['avatar']) !!});"></div>
                <span class="position"><a href="/profile/{!! $poem->user['id'] !!}">{!! $poem->user['username'] !!}</a></span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="typo">
            <span class="typo-note">Poem</span>
            <div class="blockquote">
                <p>
                    {!! $poem->poem !!}
                </p>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Description</span>
            <div class="blockquote">
                <p>
                    {!! $poem->description !!}
                </p>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Category</span>
            <div class="blockquote">
                <h3>
                    <a href="/">{!! $poem->category['name'] !!}</a>
                </h3>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Tags</span>
            <div class="blockquote">
                @forelse($poem->tags as $tag)
                    <a href="/tag/tags/{{ $tag }}">
                        <span>#{!! $tag->normalized !!} </span>
                    </a>
                @empty
                    <span> #</span>
                @endforelse
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Comment</span>
            <div class="blockquote">
                @comments(['model' => $poem])
            </div>
        </div>
    </div>
</div>