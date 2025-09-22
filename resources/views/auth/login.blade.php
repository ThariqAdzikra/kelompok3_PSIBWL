<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .card { width: 100%; max-width: 450px; }
        .divider { display: flex; align-items: center; text-align: center; color: #6c757d; }
        .divider::before, .divider::after { content: ''; flex: 1; border-bottom: 1px solid #dee2e6; }
        .divider:not(:empty)::before { margin-right: .25em; }
        .divider:not(:empty)::after { margin-left: .25em; }
        .btn-google img { width: 20px; margin-right: 12px; }
    </style>
</head>
<body>
    <div class="card p-4 shadow-sm">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Login</h3>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="login" class="form-label">Username atau Email</label>
                    <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Ingat Saya</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <div class="divider my-4">ATAU</div>

            <p class="text-center text-muted">Belum punya akun?</p>
            <a href="{{ route('google.redirect') }}" class="btn btn-outline-secondary w-100 btn-google">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google Logo">
                Daftar dengan Google
            </a>
        </div>
    </div>
</body>
</html>