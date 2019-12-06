<div class="row">
    <div class="col-md-4 text-center">
        <h2 class="heading-section mb-4">
            <small>{!! $poem->alav !!}</small>
        </h2>
        <div class="image-wrap">
            <img src="{!! $poem->poemPics() !!}" alt="{!! $poem->title !!}" class="rounded img-fluid image image-2">
            <div class="text">
                <a href="{!! $poem->pathProfile() !!}">
                    <div class="img" style="background-image: url({!! $poem->userPics() !!});"></div>
                    <span class="position">{!! $poem->user['username'] !!}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="typo">
            <span class="typo-note">Djili</span>
            <div class="blockquote">
                <p>
                    {!! $poem->djili !!}
                </p>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Varnanipe</span>
            <div class="blockquote">
                <p>
                    {!! $poem->varnanipe !!}
                </p>
            </div>
        </div>
        <div class="typo">
            <span class="typo-note">Kategoria</span>
            <div class="blockquote">
                <h3>
                    <a href="{!! $poem->pathPoemCategory() !!}">{!! $poem->category['name'] !!}</a>
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
            <span class="typo-note">Komentara</span>
            <div class="blockquote">
                @comments(['model' => $poem])
            </div>
        </div>
    </div>
</div>