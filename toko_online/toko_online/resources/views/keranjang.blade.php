<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - Toko Online</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f4f6f9; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 1.5rem; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background: #1a57a0; color: white; }
        .btn { background: #d32f2f; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 13px; }
        .btn-secondary { background: #6c757d; }
        .btn-success { background: #2e7d32; padding: 10px 20px; font-size: 16px; border: none; cursor: pointer; border-radius: 4px; color: white; }
        .actions { margin-top: 1.5rem; display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>

<div class="container">
    <h2>Keranjang Belanja Anda</h2>
    <p><a href="/" class="btn btn-secondary">&laquo; Lanjut Belanja</a></p>

    @if(empty($items))
        <p style="margin-top: 2rem; color: #666;">Keranjang belanja masih kosong.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item['nama_barang'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                    <td>
                        <a href="/keranjang/hapus/{{ $item['id_barang'] }}" class="btn">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total Bayar: Rp {{ number_format($total, 0, ',', '.') }}</h3>

        <div class="actions">
            <a href="/keranjang/kosongkan" class="btn btn-secondary">Kosongkan Keranjang</a>
            
            <!-- FORM CHECKOUT YANG BERSIH -->
            <form action="/checkout" method="POST">
                @csrf
                <button type="submit" class="btn-success">Checkout Sekarang</button>
            </form>
        </div>
    @endif
</div>

</body>
</html>