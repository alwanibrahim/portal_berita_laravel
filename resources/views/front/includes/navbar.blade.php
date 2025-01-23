<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container-fluid">
        <!-- Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="/" style="font-family: 'Protest Revolution', sans-serif; font-size: 20px;">
            <h2 class="mb-0 text-primary putar">News</h2>
        </a>

        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Nav Items -->
                <li class="nav-item">
                    <a class="nav-link" href="/" style="font-family: 'Protest Revolution', sans-serif;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fashion') }}" style="font-family: 'Protest Revolution', sans-serif; color: var(--bs-light-text-emphasis);">Fashion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('beauty') }}" style="font-family: 'Protest Revolution', sans-serif; color: var(--bs-light-text-emphasis);">Beauty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lifestyle') }}" style="font-family: 'Protest Revolution', sans-serif; color: var(--bs-light-text-emphasis);">Lifestyle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('travel') }}" style="font-family: 'Protest Revolution', sans-serif; color: var(--bs-light-text-emphasis);">Travel</a>
                </li>

                <!-- Admin Access -->
                @if (Auth::check() && Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link text-danger" href="/dashboard" style="font-weight: bold;">Back End</a>
                </li>
                @endif
            </ul>

            <!-- Dropdown User -->
            @if (Auth::check())
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" style="margin-right: 10px" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="#">My Profile</a>
                    </li>
 
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item" style="text-decoration: none;" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                </ul>
            </div>
            @endif

            <!-- Theme Toggle -->
            <div class="dropdown me-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="themeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-brightness-high-fill theme-icon-active"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="themeDropdown">
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="light">
                            <i class="bi bi-brightness-high-fill me-2"></i> Light
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="dark">
                            <i class="bi bi-moon-stars-fill me-2"></i> Dark
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="auto">
                            <i class="bi bi-circle-half me-2"></i> Auto
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Search Results -->
            @isset($query)
            <div class="ms-3">
                <h6 class="mb-2">Results for: "<strong>{{ $query }}</strong>"</h6>
                @if ($articles->isEmpty())
                <p class="text-muted">No articles found.</p>
                @else
                <ul class="list-unstyled">
                    @foreach ($articles as $article)
                    <li class="mb-2">
                        <a href="{{ route('detail-article', $article->slug) }}" class="text-decoration-none text-dark">
                            <strong>{{ $article->title }}</strong> 
                            <p class="text-muted">{{ Str::limit($article->body, 50) }}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endisset
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script>
    gsap.from('.navbar',{duration:1,y: -100, opacity:0, ease:'bounce'});
    gsap.from('.putar',{duration:1.5,rotateY:360, opacity:0, });
</script>
