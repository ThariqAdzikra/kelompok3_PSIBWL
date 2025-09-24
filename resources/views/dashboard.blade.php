<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">TokoLaptop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Katalog</a>
                    </li>

                    @if(auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kasir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Stok</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laptops">Laporan</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Suplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pelanggan</a>
                    </li>
                    @endif

                     <li class="nav-item">
                        <a class="nav-link" href="#">Chat</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                     @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ auth()->user()->nama }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Selamat Datang, {{ auth()->user()->nama }}!</h1>
        <p>Anda login sebagai <strong>{{ ucfirst(auth()->user()->role) }}</strong>.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>