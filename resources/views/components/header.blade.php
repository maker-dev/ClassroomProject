<header class="navbar navbar-expand-lg navbar-dark p-3 shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <img src="/assets/logo.png" alt="ClassRoom Logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars burger-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto mt-lg-0 mt-2">
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white text-capitalize" href="{{ route('home') }}">
                            Classrooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-capitalize" href="{{ route('profile.edit') }}">
                            Profile</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger nav-link text-white text-capitalize">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white text-capitalize" href="{{ route('login') }}"><i
                                class="fa-solid fa-right-to-bracket me-2"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-capitalize" href="{{ route('register') }}"><i
                                class="fa-solid fa-user me-2"></i>Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</header>
