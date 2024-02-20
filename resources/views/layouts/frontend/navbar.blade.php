<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('/assets/images/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mentor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Business</a>
                </li>

            </ul>
            @auth
            <div class="d-flex">
                <div class="dropdown">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline small">{{ Auth::user()->name }}</span>
                        @if (Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" class="img-profile rounded-circle" srcset="" width="35px"
                            height="35px">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                            class="img-profile rounded-circle" srcset="" width="35px" height="35px">
                        @endif

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenulink" style=" right:0; left:0;">
                        <li><a class="dropdown-item" href="{{ route('home') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form'). submit()">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-master btn-secondary me-3">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="btn btn-master btn-primary">
                    Sign Up
                </a>
                @endauth
            </div>
        </div>
    </div>
</nav>