<h2 class="heading-section mb-4">
    @auth
        @if(Auth::user()->Admin())
            <a href="/history/{!! $history->id !!}-{!! \Illuminate\Support\Str::slug($history->alav, '_') !!}">{!! $history->alav !!}</a>
        @endif
    @endauth
</h2>
<div class="typo">
    <p>
        {!! $history->istorija !!}
    </p>
    <small>
        &mdash; Ivan Demirović
    </small>
</div>
