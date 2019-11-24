<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="ion-ios-globe mr-2"></i> Romano Lumij</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/history" class="nav-link icon d-flex align-items-center"> History</a></li>
                <li class="nav-item"><a href="/" class="nav-link icon d-flex align-items-center"> Poems</a></li>
                <li class="nav-item"><a href="/" class="nav-link icon d-flex align-items-center"> Stories</a></li>
                <li class="nav-item"><a href="/" class="nav-link icon d-flex align-items-center"> Images</a></li>
                <li class="nav-item"><a href="/" class="nav-link icon d-flex align-items-center"> Dictionary</a></li>
                <li class="nav-item"><a href="/" class="nav-link icon d-flex align-items-center"> Contact</a></li>
                <li class="nav-item"><a href="/" class="nav-link icon d-flex align-items-center"> Profile</a></li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
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
