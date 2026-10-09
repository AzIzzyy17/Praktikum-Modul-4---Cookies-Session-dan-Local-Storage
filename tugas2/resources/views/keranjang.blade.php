<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    
    <h2>Keranjang belanja</h2>
    <p>Tanpa login</p>
    <hr>
    
    @if(empty($detailKeranjang))
        <p>Keranjang kosong.</p>
    @else
        <ul style="list-style-type: none; padding: 0;">
            @foreach ($detailKeranjang as $item)
                <li style="margin-bottom: 15px;">
                    {{ $item['nama'] }} <br>
                    Rp {{ number_format($item['harga'], 0, ',', '.') }} x {{ $item['jumlah'] }} = Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                    
            <br>
                    <a href="/keranjang/kurang/{{ $item['id'] }}" style="text-decoration: none; color: black;">[-]</a>
                    {{ $item['jumlah'] }}
                    <a href="/keranjang/tambah/{{ $item['id'] }}" style="text-decoration: none; color: black;">[+]</a>
                    <a href="/keranjang/hapus/{{ $item['id'] }}" style="text-decoration: none; color: red; margin-left: 10px;">[hps]</a>
                </li>
            @endforeach
        </ul>
        
        <hr>
        <p><strong>Total: Rp {{ number_format($totalHarga, 0, ',', '.') }}</strong></p>
        
        <a href="/keranjang/kosongkan" style="text-decoration: none; color: blue;">[ Kosongkan keranjang ]</a>
    @endif
    
    <br><br>
    <a href="/" style="text-decoration: none; color: blue;">&laquo; Kembali ke Daftar Barang</a>

</body>
</html>