<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Alat Tulis - PR</title>
    
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f4f6f9; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #ccc; padding-bottom: 1rem; margin-bottom: 2rem; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.5rem; }
        .card { background: #fff; border: 1px solid #ddd; padding: 1.2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .card h3 { margin: 10px 0 5px 0; font-size: 18px; }
        .card p { margin: 5px 0; color: #555; font-size: 14px; }
        .btn { background: #1a57a0; color: #fff; padding: 8px 12px; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 10px; font-weight: bold; }
        .btn-disabled { background: #ccc; color: #666; cursor: not-allowed; }
        .cart-badge { background: #ff5722; color: white; padding: 8px 15px; border-radius: 20px; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Toko Alat Tulis</h1>
        <div>
            @if(Session::has('id_user'))
                <span style="margin-right: 10px; font-weight: bold;">Halo, {{ Session::get('nama_lengkap') }}</span>
                <a href="/riwayat-pesanan" class="btn" style="background: #2e7d32; padding: 8px 12px; color:white; text-decoration:none; border-radius:4px;">Riwayat</a>
                <a href="/logout" class="btn" style="background: #d32f2f; padding: 8px 12px; color:white; text-decoration:none; border-radius:4px;">Logout</a>
            @else
                <a href="/login" class="btn" style="background: #1a57a0; padding: 8px 12px; color:white; text-decoration:none; border-radius:4px;">Login</a>
            @endif
            <a href="/keranjang" class="cart-badge" style="margin-left: 10px;">🛒 Keranjang ({{ $totalKeranjang ?? 0 }})</a>
        </div>
    </div>
    
    <h2>Daftar Barang (Total: {{ count($products) }})</h2>
    
    <div class="grid">
        @foreach($products as $p)
        <div class="card">
            <div style="font-size: 11px; color: #888;">ID: {{ $p->id_barang }}</div>
            <h3>{{ $p->nama_barang }}</h3>
            <p>{{ $p->deskripsi }}</p>
            <p><strong style="color: #2e7d32;">Rp {{ number_format($p->harga, 0, ',', '.') }}</strong></p>
            <p style="font-size: 13px; font-weight: bold; color: {{ $p->stok > 0 ? '#1976d2' : '#d32f2f' }};">
                Stok: {{ $p->stok }}
            </p>

            @if($p->stok > 0)
                <a href="/keranjang/tambah-produk/{{ $p->id_barang }}" class="btn">Masukkan ke krj</a>
            @else
                <span class="btn btn-disabled">Stok Habis</span>
            @endif
        </div>
        @endforeach
    </div>

</body>
</html>