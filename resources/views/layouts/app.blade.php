<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chitanka</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <header>
        <div class="container">
            <p>CHITANKA</p>
            <nav>
                <a href="/">Inicio </a>
                <a href="/suma"> Sumar </a>
                <a href="/products"> Productos </a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>


    <footer>
        <p>Sobre nosotros</p>
    </footer>
</body>

</html>