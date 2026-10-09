<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Alat Tulis</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    
    <h2>Toko Alat Tulis</h2>
    <p>
        <a href="/keranjang" style="text-decoration: none; color: blue;">
            [ Keranjang ({{ $totalItem }}) ]
        </a>
    </p>
    
    <hr>
    <h3>Daftar barang</h3>
    
    <ul style="list-style-type: none; padding: 0;">
        @foreach ($barangs as $barang)
            <li style="margin-bottom: 10px;">
                📦 {{ $barang->nama }} - Rp {{ number_format($barang->harga, 0, ',', '.') }}
                
                <!-- Tombol untuk memasukkan ke keranjang -->
                <form action="/tambah/{{ $barang->id }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="margin-left: 10px;">[Masukkan ke krj]</button>
                </form>
            </li>
        @endforeach
    </ul>

</body>
</html>