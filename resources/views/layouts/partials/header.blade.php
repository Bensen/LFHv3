<header>
    <div class="container">
        <nav class="navbar navbar-toggleable-sm primary-color">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="{{ route('page.home') }}">{{ config('app.name') }}</a>
            <div id="navigation" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    @if (Auth::guest())
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('character.index') }}">Kämpfer</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('team.index') }}">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('page.ranking') }}">Rangliste</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="http://p383200.webspaceconfig.de/phpbb/" target="_blank">Forum</a></li>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" data-toggle="modal" data-target="#loginModal">Anmelden</a></li>
                        @include('auth.login')
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrieren</a></li>
                    @else
                        <li class="nav-item avatar dropdown">
                            <a id="userDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <img class="img-fluid rounded-circle" src="{{ asset('img/avatars/avatar-default.svg') }}" title="Account" data-toggle="tooltip" data-placement="bottom">
                            </a>
                            <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="userDropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
