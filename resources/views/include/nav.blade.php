<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="ion-ios-globe mr-2"></i> Romano Lumij</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> @lang('menu.menu')
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/locale/en" class="nav-link icon d-flex align-items-center"> English</a>
                </li>
                <li class="nav-item">
                    <a href="/locale/rom" class="nav-link icon d-flex align-items-center"> Romane</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/history" class="nav-link icon d-flex align-items-center"> @lang('menu.history')</a></li>
                <li class="nav-item"><a href="/poem" class="nav-link icon d-flex align-items-center"> @lang('menu.poems')</a></li>
                <li class="nav-item"><a href="/story" class="nav-link icon d-flex align-items-center"> @lang('menu.stories')</a></li>
                <li class="nav-item"><a href="/album" class="nav-link icon d-flex align-items-center"> @lang('menu.albums')</a></li>
                <li class="nav-item"><a href="/lexicon" class="nav-link icon d-flex align-items-center"> @lang('menu.lexicon')</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link icon d-flex align-items-center"> @lang('menu.contact')</a></li>
                @auth()
                <li class="nav-item"><a href="/profile/{!! Auth::id() !!}" class="nav-link icon d-flex align-items-center"> @lang('menu.profile')</a></li>
                @endauth
                    <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('menu.login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('menu.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('menu.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
