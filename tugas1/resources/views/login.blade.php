<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <p>Masuk untuk membuka dashboard</p>

    {{-- Menampilkan pesan error jika login gagal --}}
    @if($errors->has('loginError'))
        <p style="color: red;">[ {{ $errors->first('loginError') }} ]</p>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <p>
            <label>Username</label><br>
            <input type="text" name="username" required>
        </p>
        <p>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </p>
        <button type="submit">Masuk</button>
    </form>
</body>
</html>