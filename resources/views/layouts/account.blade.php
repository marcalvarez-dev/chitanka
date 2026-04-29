<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Googlefonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="description" content="Libreria online Chitanka">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Laravel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titulo -->
    <title>
        @yield('title')
    </title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

</head>

<body class="d-flex flex-column min-vh-100">

    @include('layouts._partials.menu')

    <div class="container-fluid">
        <div class="row">
            <div class="col-3 bg-light vh-100 p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">Mi información</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('account.password') }}" class="nav-link">Contraseña</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('addresses.index') }}" class="nav-link">Mis direcciones</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('history') }}" class="nav-link">Historial de compra</a>
                    </li>


                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a href="{{ route('edition.create') }}" class="nav-link">Añadir Edición</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="nav-link">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-9 p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
