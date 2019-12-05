<div class="row">
    <div class="col-md-4 text-center">
        <h2 class="heading-section mb-4">
            <small>{!! $story->alav !!}</small>
        </h2>
        <div class="image-wrap">
            <img src="{!! $story->storyPics() !!}" alt="{!! $story->title !!}" class="rounded img-fluid image image-2">
            <div class="text">
                <a href="{!! $story->pathProfile() !!}">
                    <div class="img" style="background-image: url({!! $story->userPics() !!});"></div>
                    <span class="position">{!! $story->user['username'] !!}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="typo">
            <span class="typo-note">Paramića</span>
            <div class="blockquote">
                <p>
                    {!! $story->paramica !!}
                </p>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Varnanipe</span>
            <div class="blockquote">
                <p>
                    {!! $story->varnanipe !!}
                </p>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Kategoria</span>
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
            <span class="typo-note">Komentara</span>
            <div class="blockquote">
                @comments(['model' => $story])
            </div>
        </div>
    </div>
</div>