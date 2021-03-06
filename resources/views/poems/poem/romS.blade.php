<div class="row">
    <div class="col-md-4 text-center">
        <h2 class="heading-section mb-4">
            <small></small>
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
            <span class="typo-note">Alav</span>
            <div class="blockquote">
                <h1>
                    {!! $poem->alav !!}
                </h1>
            </div>
        </div>
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
                <a href="{!! $poem->pathPoemCategory() !!}">
                    <img src="{!! $poem->poemCategoryPics() !!}" alt="{!! $poem->category['name'] !!}" class="image img-fluid img-2" style="width: 25%;">
                </a>
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
