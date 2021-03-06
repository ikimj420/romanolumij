@forelse($histories as $history)
    <h2 class="heading-section mb-4">
        @auth
            @if(Auth::user()->Admin())
                <a href="{!! $history->pathTitle() !!}">{!! $history->title !!}</a>
            @endif
        @endauth
    </h2>
    <div class="typo">
        <p>
            {!! $history->history !!}
        </p>
        <small>
            &mdash; Ivan Demirović
        </small>
    </div>
@empty
@endforelse