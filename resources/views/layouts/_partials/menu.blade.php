<header>
    <nav class="navbar navbar-expand-md navbar-light py-2">
        <div class="container">
            <a class="navbar-brand" href="{{ route('edition.index') }}">
                <img src="{{ asset('assets/img/logo.png') }}" width="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <form action="{{ route('search') }}"
                    method="GET"
                    class="d-flex mx-auto my-2 my-md-0"
                    style="max-width: 500px; width: 100%;">
                    <input type="search"
                        name="q"
                        class="form-control"
                        placeholder="Buscar libro...">
                </form>
                <div class="d-flex align-items-center gap-4 ms-auto">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link d-flex align-items-center gap-2">
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
    </nav>
</header>