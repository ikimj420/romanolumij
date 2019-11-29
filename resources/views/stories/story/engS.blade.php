<div class="row">
    <div class="col-md-4 text-center">
        <h2 class="heading-section mb-4">
            <small>{!! $story->title !!}</small>
        </h2>
        <div class="image-wrap">
            <img src="{!! asset('/storage/stories/'.$story->pics) !!}" alt="{!! $story->title !!}" class="rounded img-fluid image image-2">
            <div class="text">
                <div class="img" style="background-image: url({!! asset('/storage/users/'.$story->user['avatar']) !!});"></div>
                <span class="position"><a href="/profile/{!! $story->user['id'] !!}">{!! $story->user['username'] !!}</a></span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="typo">
            <span class="typo-note">Story</span>
            <div class="blockquote">
                <p>
                    {!! $story->story !!}
                </p>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Description</span>
            <div class="blockquote">
                <p>
                    {!! $story->description !!}
                </p>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Category</span>
            <div class="blockquote">
                <h3>
                    <a href="/">{!! $story->category['name'] !!}</a>
                </h3>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Tags</span>
            <div class="blockquote">
                @forelse($story->tags as $tag)
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
                @comments(['model' => $story])
            </div>
        </div>
    </div>
</div>