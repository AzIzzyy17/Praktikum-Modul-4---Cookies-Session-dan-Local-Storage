<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #000; padding-bottom: 10px; margin-bottom: 10px;">
        <h2 style="margin: 0;">Dashboard</h2>
        <form method="POST" action="{{ url('/logout') }}" style="margin: 0;">
            @csrf
            <button type="submit">[ Logout ]</button>
        </form>
    </div>

    <p>Selamat datang, {{ auth()->user()->nama_lengkap }}!</p>
    <p>Halaman ini hanya bisa dibuka setelah login.</p>
    <p>Username: {{ auth()->user()->username }}</p>
</body>
</html>