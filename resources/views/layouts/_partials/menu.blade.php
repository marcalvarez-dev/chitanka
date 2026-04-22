<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-toggler"
                aria-controls="navbarTogglerDemo01"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-toggler">
                <a class="navbar-brand" href="{{route('edition.index')}}">
                    <img src="{{ asset('assets/img/logo.png') }}" width="50" alt="Logo de la página web" />
                </a>
                <div style="display: flex;">

                    <form action="{{route('search')}}" method="get" class="d-flex flex-row">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar por título, autor, género, ISBN" aria-label="Search" name="q">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>

                    </form>
                </div>
                <ul
                    class="navbar-nav d-flex justify-content-center align-items-center">
                    <li class="nav-item">
                        @auth
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <p>{{auth()->user()->name}}</p>
                            <i class="bi bi-person"></i>
                        </a>
                        @endauth

                        @guest
                        <a class="nav-link" href="register">
                            <i class="bi bi-person"></i>
                        </a>
                        @endguest

                    </li>
                    <li class="nav-item">
                        <a href="{{route('cart.index')}}"> <i class="bi bi-cart"></i> </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>