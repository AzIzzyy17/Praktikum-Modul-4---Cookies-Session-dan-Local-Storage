<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Toko Online</title>
    <style>
        body { font-family: sans-serif; background: #f4f6f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; }
        h2 { text-align: center; color: #1a57a0; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 5px; font-size: 14px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; background: #1a57a0; color: white; padding: 10px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .error { color: #d32f2f; font-size: 13px; margin-bottom: 1rem; text-align: center; }
        .back { text-align: center; margin-top: 1rem; font-size: 13px; }
        .back a { color: #1a57a0; text-decoration: none; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Login Toko</h2>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Masuk</button>
    </form>

    <div class="back" style="margin-top: 15px;">
        Belum punya akun? <a href="/register">Buat akun baru</a>
    </div>

    <div class="back">
        <a href="/">&laquo; Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>