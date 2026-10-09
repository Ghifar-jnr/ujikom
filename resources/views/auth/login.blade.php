<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ujikom Reimbursement</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eef3f8;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .08);
        }

        .login-title {
            text-align: center;
            margin-bottom: 28px;
            font-weight: bold;
            color: #183b56;
        }

        .btn-login {
            background: #1769aa;
            color: white;
        }

        .btn-login:hover {
            background: #125487;
            color: white;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="login-title">LOGIN</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">User</label>
            <input
                type="text"
                id="username"
                name="username"
                class="form-control"
                value="{{ old('username') }}"
                placeholder="Masukkan username"
                autocomplete="username"
                required
                autofocus
            >
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                autocomplete="current-password"
                required
            >
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-login w-50">
                Login
            </button>

            <a href="{{ route('register') }}"
               class="btn btn-outline-primary w-50">
                Daftar
            </a>
        </div>
    </form>
</div>

</body>
</html>
