<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Googlefonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Boostrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />

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
    </title>

    <!-- Favicon -->


</head>

<body class="bg-light">
    <div class="container mt-5" style="max-width: 420px;">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="text-center mb-4">Login</h3>
                <!-- Session status -->
                @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email"
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username">
                        @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password"
                            type="password"
                            name="password"
                            class="form-control"
                            required
                            autocomplete="current-password">

                        @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember -->
                    <div class="mb-3 form-check">
                        <input type="checkbox"
                            name="remember"
                            id="remember"
                            class="form-check-input">

                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                    <!-- Forgot password -->
                    <div class="mb-3 text-end">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                        @endif
                    </div>
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary w-100">
                        Log in
                    </button>
                </form>
                <div>
                </div>
            </div>
</body>

</html>