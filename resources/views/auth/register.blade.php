<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5" style="max-width: 500px;">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="text-center mb-4">Register</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name"
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name">
                        @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Last Name -->
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input id="last_name"
                            type="text"
                            name="last_name"
                            class="form-control"
                            value="{{ old('last_name') }}"
                            required
                            autocomplete="last_name">
                        @error('last_name')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email"
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
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
                            autocomplete="new-password">
                        @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                            autocomplete="new-password">
                    </div>
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary w-100">
                        Register
                    </button>
                    <!-- Login link -->
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}">Already registered?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>