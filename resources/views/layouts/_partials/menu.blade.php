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
                <a class="navbar-brand" href="{{route('book.index')}}"><img src="{{ asset('assets/img/unknown_book.png') }}" width="50" alt="Logo de la página web" /></a>
                <ul
                    class="navbar-nav d-flex justify-content-center align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/welcome">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/suma">Sumar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>