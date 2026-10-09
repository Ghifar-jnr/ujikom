<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') - Ujikom Reimbursement</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #183b56;
            color: white;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .sidebar-brand {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding: 10px 0 28px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .sidebar-menu {
            margin-top: 25px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            margin-bottom: 8px;
            color: #dbe6ee;
            text-decoration: none;
            border-radius: 8px;
            transition: .2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #1769aa;
            color: white;
        }

        .sidebar-menu i {
            width: 20px;
            text-align: center;
        }

        .sidebar-logout {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,.15);
            padding-top: 18px;
        }

        .sidebar-logout button {
            width: 100%;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            color: #fff;
            background: #b8323c;
            border: none;
            border-radius: 8px;
        }

        .sidebar-logout button:hover {
            background: #922630;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            padding: 18px 24px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.04);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.04);
        }

        .welcome-text {
            color: #183b56;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                padding: 15px;
            }

            .sidebar-brand {
                font-size: 16px;
            }
        }

        @media (max-width: 550px) {
            .sidebar {
                width: 70px;
                padding: 18px 8px;
            }

            .sidebar-brand {
                font-size: 0;
            }

            .sidebar-brand i {
                font-size: 23px;
            }

            .sidebar-menu a,
            .sidebar-logout button {
                justify-content: center;
                padding: 14px 5px;
                font-size: 0;
            }

            .sidebar-menu i,
            .sidebar-logout i {
                font-size: 18px;
            }

            .main-content {
                margin-left: 70px;
                padding: 12px;
            }

            .topbar {
                padding: 15px;
            }

            .content-card {
                padding: 16px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-wallet me-2"></i>
            REIMBURSEMENT
        </div>

        <nav class="sidebar-menu">
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-house"></i>
                <span>User</span>
            </a>

            <a href="{{ route('master.index') }}"
               class="{{ request()->routeIs('master.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Master</span>
            </a>

            <a href="{{ route('transaksi.index') }}"
               class="{{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
                <i class="fas fa-money-bill-transfer"></i>
                <span>Transaksi</span>
            </a>
        </nav>

        <div class="sidebar-logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i class="fas fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div>
                <h5 class="mb-1">@yield('page-heading', 'Welcome')</h5>
                <small class="text-muted">Ujikom Reimbursement</small>
            </div>

            <div class="text-end">
                <span class="text-muted small">Login sebagai</span>
                <div class="fw-bold">
                    {{ Auth::user()->username }}
                </div>
            </div>
        </header>

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
