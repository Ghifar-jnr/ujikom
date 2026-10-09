<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Ujikom Reimbursement</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px 0;
            background: #eef3f8;
            font-family: Arial, sans-serif;
        }

        .register-card {
            width: 100%;
            max-width: 480px;
            background: white;
            padding: 32px;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .08);
        }

        .register-title {
            text-align: center;
            margin-bottom: 25px;
            color: #183b56;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="register-card">
    <h3 class="register-title">PENDAFTARAN</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea
                id="alamat"
                name="alamat"
                class="form-control"
                rows="3"
                required
            >{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">User</label>
            <input
                type="text"
                id="username"
                name="username"
                class="form-control"
                value="{{ old('username') }}"
                autocomplete="username"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                autocomplete="new-password"
                required
            >
            <small class="text-muted">Minimal 8 karakter.</small>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">
                Konfirmasi Password
            </label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-control"
                autocomplete="new-password"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Daftar
        </button>

        <div class="text-center mt-3">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </form>
</div>

</body>
</html>
