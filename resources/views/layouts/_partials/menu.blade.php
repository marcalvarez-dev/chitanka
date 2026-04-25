<header>
    <nav class="navbar navbar-expand-md navbar-light py-2">
        <div class="container position-relative">

            <a class="navbar-brand" href="{{ route('edition.index') }}">
                <img src="{{ asset('assets/img/logo.PNG') }}" width="80">
            </a>
            <p>
                CHitanka
            </p>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">

                <div class="d-flex w-100 align-items-center">

                    <div class="flex-grow-1"></div>

                    <form action="{{ route('search') }}" method="GET" class="d-flex w-50 justify-content-center">
                        <input type="search" name="q" class="form-control" placeholder="Buscar libro...">
                    </form>

                    <div class="flex-grow-1 d-flex justify-content-end align-items-center gap-4">

                        <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center gap-2">

                            <i class="bi bi-person"></i>

                            @auth
                                <span>{{ auth()->user()->name }}</span>
                            @endauth
                        </a>

                        <a href="{{ route('cart.index') }}" class="nav-link">
                            <i class="bi bi-cart"></i>
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </nav>
</header>
