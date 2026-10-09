<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Akun - Toko Online</title>
    <style>
        body { font-family: sans-serif; background: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px 0; }
        .register-card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 400px; }
        h2 { text-align: center; color: #1a57a0; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 5px; font-size: 13px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        textarea { resize: vertical; height: 60px; }
        button { width: 100%; background: #2e7d32; color: white; padding: 10px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .error-list { background: #ffebee; color: #c62828; padding: 10px; border-radius: 4px; font-size: 12px; margin-bottom: 1rem; }
        .back { text-align: center; margin-top: 1rem; font-size: 13px; }
        .back a { color: #1a57a0; text-decoration: none; }
    </style>
</head>
<body>

<div class="register-card">
    <h2>Daftar Akun Baru</h2>

    @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp') }}" required>
        </div>
        <div class="form-group">
            <label>Alamat Pengiriman</label>
            <textarea name="alamat" required>{{ old('alamat') }}</textarea>
        </div>
        <button type="submit">Daftar Sekarang</button>
    </form>

    <div class="back">
        <a href="/login">&laquo; Sudah punya akun? Login di sini</a>
    </div>
</div>

</body>
</html>