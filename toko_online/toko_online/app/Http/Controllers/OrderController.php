<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function checkout(Request $request)
{
    if (!Session::has('id_user')) {
        return redirect('/login');
    }

    $keranjang = Session::get('keranjang', []);
    if (empty($keranjang)) {
        return redirect('/keranjang')->with('error', 'Keranjang masih kosong!');
    }

    $id_user = Session::get('id_user');

    $id_order = 'O' . date('ymdHis'); 

    $total_harga = 0;
    foreach ($keranjang as $item) {
        $product = Product::where('id_barang', $item['id'])->first();
        if (!$product || $product->stok < $item['jumlah']) {
            return redirect('/keranjang')->with('error', 'Stok produk tidak mencukupi!');
        }
        $total_harga += $product->harga * $item['jumlah'];
    }

    DB::beginTransaction();
    try {
        $order = Order::create([
            'id_order' => $id_order,
            'id_user' => $id_user,
            'tanggal_order' => now(),
            'total_harga' => $total_harga,
            'alamat_pengiriman' => 'Alamat Pengguna (Default)'
        ]);

        foreach ($keranjang as $item) {
            $product = Product::where('id_barang', $item['id'])->first();

            OrderDetail::create([
                'id_order' => $id_order,
                'id_barang' => $item['id'],
                'harga_satuan' => $product->harga,
                 'jumlah_beli' => $item['jumlah']
            ]);

            $product->stok -= $item['jumlah'];
            $product->save();
        }

        DB::commit();
        Session::forget('keranjang');

        return redirect('/riwayat-pesanan')->with('success', 'Checkout berhasil!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/keranjang')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

public function riwayat()
{
    if (!Session::has('id_user')) {
        return redirect('/login');
    }
    $id_user = Session::get('id_user');
    $orders = Order::with('details.product')->where('id_user', $id_user)->get();
    return view('riwayat', compact('orders'));
}
}