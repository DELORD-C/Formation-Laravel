<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">{{ __('Home') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('random') }}">{{ __('Random') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Post') }}
                    </a>
                    <ul class="dropdown-menu">
                        @can('auth')
                        <li><a class="dropdown-item" href="{{ route('post.create') }}">{{ __('Create') }}</a></li>
                        @endcan
                        <li><a class="dropdown-item" href="{{ route('post.list') }}">{{ __('List') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Review') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('review.create') }}">{{ __('Create') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('review.index') }}">{{ __('List') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('User') }}
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin')
                            <li><a class="dropdown-item" href="{{ route('user.list') }}">{{ __('List') }}</a></li>
                        @endcan
                        @if (Auth::user())
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}">{{ __('Logout') }}</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('user.login') }}">{{ __('Login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.register') }}">{{ __('Register') }}</a></li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    @if(session()->get('_locale') != 'fr') <a class="nav-link nav-icon" aria-current="page" href="{{ route('locale', 'fr') }}"><span class="fi fi-fr"></span></a> @endif
                    @if(session()->get('_locale') != 'en') <a class="nav-link nav-icon" aria-current="page" href="{{ route('locale', 'en') }}"><span class="fi fi-gb"></span></a> @endif
                </li>
            </ul>
            @if (Auth::user())
                <div class="navbar-text">{{ Auth::user()->email }} <i class="bi bi-person-circle"></i></div>
            @endif
        </div>
    </div>
</nav>
