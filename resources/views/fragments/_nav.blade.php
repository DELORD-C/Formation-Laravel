<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('random') }}">Random</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Post
                    </a>
                    <ul class="dropdown-menu">
                        @can('auth')
                        <li><a class="dropdown-item" href="{{ route('post.create') }}">Create</a></li>
                        @endcan
                        <li><a class="dropdown-item" href="{{ route('post.list') }}">List</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Review
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('review.create') }}">Create</a></li>
                        <li><a class="dropdown-item" href="{{ route('review.index') }}">List</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        User
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin')
                            <li><a class="dropdown-item" href="{{ route('user.list') }}">List</a></li>
                        @endcan
                        @if (Auth::user())
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('user.login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.register') }}">Register</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            @if (Auth::user())
            <div class="navbar-text">{{ Auth::user()->email }} <i class="bi bi-person-circle"></i></div>
            @endif
        </div>
    </div>
</nav>
