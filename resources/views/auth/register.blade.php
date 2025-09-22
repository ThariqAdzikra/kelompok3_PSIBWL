<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .card { width: 100%; max-width: 500px; }
        .profile-pic { width: 70px; height: 70px; border-radius: 50%; object-fit: cover; }
    </style>
</head>
<body>
    <div class="card p-4 shadow-sm">
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ $googleUserData['avatar'] ?? '' }}" alt="Avatar" class="profile-pic">
                <h4 class="mt-2">Lengkapi Pendaftaran</h4>
                <p class="text-muted">Email <strong>{{ $googleUserData['email'] ?? '' }}</strong> telah diverifikasi.</p>
            </div>
            
            @if(session('info'))
                <div class="alert alert-info">{{ session('info') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Selesaikan Pendaftaran</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>