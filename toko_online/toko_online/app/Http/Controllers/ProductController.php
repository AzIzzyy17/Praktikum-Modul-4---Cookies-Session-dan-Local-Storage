<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $keranjang = Session::get('keranjang', []);
        $totalKeranjang = collect($keranjang)->sum('jumlah');

        return view('index', compact('products', 'totalKeranjang'));
    }

    public function tambahKeranjang($id)
    {

        if (!Session::has('id_user')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk belanja!');
        }
        
        $produk = Product::where('id_barang', $id)->first();
        if (!$produk || $produk->stok <= 0) {
            return redirect()->back();
        }

        $keranjang = Session::get('keranjang', []);
        
        $found = false;
        foreach ($keranjang as $key => $item) {
            if ($item['id'] == $id) {
                // Cek apakah jumlah melebihi stok
                if ($keranjang[$key]['jumlah'] < $produk->stok) {
                    $keranjang[$key]['jumlah'] += 1;
                }
                $found = true;
                break;
            }
        }

        if (!$found) {
            $keranjang[] = [
                'id' => $produk->id_barang,
                'jumlah' => 1
            ];
        }

        Session::put('keranjang', $keranjang);
        return redirect()->back();
    }

    public function keranjang()
    {
        $keranjang = Session::get('keranjang', []);
        $items = [];
        $total = 0;

        foreach ($keranjang as $item) {
            $product = Product::where('id_barang', $item['id'])->first();
            if ($product) {
                $subtotal = $product->harga * $item['jumlah'];
                $total += $subtotal;
                $items[] = [
                    'id_barang' => $product->id_barang,
                    'nama_barang' => $product->nama_barang,
                    'harga' => $product->harga,
                    'jumlah' => $item['jumlah'],
                    'subtotal' => $subtotal
                ];
            }
        }

        return view('keranjang', compact('items', 'total'));
    }

    public function hapusKeranjang($id)
    {
        $keranjang = Session::get('keranjang', []);
        foreach ($keranjang as $key => $item) {
            if ($item['id'] == $id) {
                unset($keranjang[$key]);
                break;
            }
        }
        Session::put('keranjang', array_values($keranjang));
        return redirect('/keranjang');
    }

    public function kosongkanKeranjang()
    {
        Session::forget('keranjang');
        return redirect('/keranjang');
    }

}