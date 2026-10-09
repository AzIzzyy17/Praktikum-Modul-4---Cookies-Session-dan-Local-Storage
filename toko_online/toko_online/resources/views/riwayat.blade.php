<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pesanan - Toko Online</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f4f6f9; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .order-card { border: 1px solid #ddd; padding: 1rem; margin-bottom: 1rem; border-radius: 6px; background: #fafafa; }
        .btn { background: #1a57a0; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; display: inline-block; margin-bottom: 1rem; }
    </style>
</head>
<body>

<div class="container">
    <h2>Riwayat Pesanan Anda</h2>
    <a href="/" class="btn">&laquo; Kembali ke Beranda</a>

    @if($orders->isEmpty())
        <p>Belum ada riwayat pesanan.</p>
    @else
        @foreach($orders as $o)
        <div class="order-card">
            <p><strong>ID Order:</strong> {{ $o->id_order }}</p>
            <p><strong>Tanggal:</strong> {{ $o->tanggal_order }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($o->total_harga, 0, ',', '.') }}</p>
            <p><strong>Alamat Pengiriman:</strong> {{ $o->alamat_pengiriman }}</p>
        </div>
        @endforeach
    @endif
</div>

</body>
</html>