<header>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="{{ route('edition.index') }}">
                <img src="{{ asset('assets/img/logo.png') }}" width="40">
            </a>
            <form action="{{ route('search') }}"
                method="GET"
                class="d-flex flex-grow-1 justify-content-center mx-4">

                <div style="max-width: 500px; width: 100%;">
                    <input type="search"
                        name="q"
                        class="form-control"
                        placeholder="Buscar libro...">
                </div>
            </form>
            <div class="d-flex align-items-center gap-4">

                <a href="{{ route('dashboard') }}"
                    class="nav-link d-flex align-items-center gap-2">

                    <i class="bi bi-person"></i>

                    @auth
                    <span>{{ auth()->user()->name }}</span>
                    @endauth

                </a>
                <a href="{{ route('cart.index') }}"
                    class="nav-link">
                    <i class="bi bi-cart"></i>
                </a>
            </div>
        </div>
    </nav>
</header>