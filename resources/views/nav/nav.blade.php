<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
    <div class="container-xl">
        <!-- Logo -->
        <a class="navbar-brand h2" href="#">
            Deepak kanojiya
        </a>
        <!-- Navbar toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Nav -->

            @if (Route::has('login'))
                <div class="navbar-nav mx-lg-auto">
                    <a class="nav-item nav-link" href="/">Home</a>
                    <a class="nav-item nav-link" href="/blog">Blog</a>
                    <a class="nav-item nav-link" href="#">Pricing</a>
                    @auth

                        @if (Auth::user()->role == 'admin')
                            <a class="nav-item nav-link" href="{{ url('/admin') }}" aria-current="page">Admin</a>
                        @endif
                        <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                            <a href="{{ route('logout') }}" class="btn btn-sm btn-danger w-full w-lg-auto">
                                logout
                            </a>
                        </div>
                    @else
                        <div class="navbar-nav ms-lg-4">
                            <a class="nav-item nav-link" href="{{ route('login') }}">Sign in</a>
                        </div>

                        @if (Route::has('register'))
                            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                                <a href="{{ route('register') }}" class="btn btn-sm btn-primary w-full w-lg-auto">
                                    Register
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
