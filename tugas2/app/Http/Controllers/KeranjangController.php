<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KeranjangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        
        $keranjang = Session::get('keranjang', []);
        
        $totalItem = 0;
        foreach ($keranjang as $item) {
            $totalItem += $item['jumlah'];
        }

        return view('daftar_barang', compact('barangs', 'totalItem'));
    }

    public function tambah($id)
    {
        $keranjang = Session::get('keranjang', []);

        $sudahAda = false;
        foreach ($keranjang as $key => $item) {
            if ($item['id'] == $id) {
                // Jika sudah ada, tambahkan jumlahnya saja
                $keranjang[$key]['jumlah'] += 1;
                $sudahAda = true;
                break;
            }
        }

        if (!$sudahAda) {
            $keranjang[] = [
                'id' => $id,
                'jumlah' => 1
            ];
        }

        Session::put('keranjang', $keranjang);

        return back();
    }

    public function keranjang()
    {
        $keranjang = Session::get('keranjang', []);
        
        $detailKeranjang = [];
        $totalHarga = 0;

        foreach ($keranjang as $item) {
            $barang = Barang::find($item['id']);
            
            if ($barang) {
                $subtotal = $barang->harga * $item['jumlah'];
                $totalHarga += $subtotal;
                
                $detailKeranjang[] = [
                    'id' => $item['id'],
                    'nama' => $barang->nama,
                    'harga' => $barang->harga,
                    'jumlah' => $item['jumlah'],
                    'subtotal' => $subtotal
                ];
            }
        }
        return view('keranjang', compact('detailKeranjang', 'totalHarga'));
    }
    public function tambahJumlah($id)
    {
        $keranjang = Session::get('keranjang', []);
        foreach ($keranjang as $key => $item) {
            if ($item['id'] == $id) {
                $keranjang[$key]['jumlah'] += 1;
                break;
            }
        }
        Session::put('keranjang', $keranjang);
        return back();
    }

    public function kurangJumlah($id)
    {
        $keranjang = Session::get('keranjang', []);
        foreach ($keranjang as $key => $item) {
            if ($item['id'] == $id) {
                $keranjang[$key]['jumlah'] -= 1;
                // Jika jumlah 0, hapus dari keranjang
                if ($keranjang[$key]['jumlah'] <= 0) {
                    unset($keranjang[$key]);
                }
                break;
            }
        }
        Session::put('keranjang', array_values($keranjang));
        return back();
    }

    public function hapus($id)
    {
        $keranjang = Session::get('keranjang', []);
        foreach ($keranjang as $key => $item) {
            if ($item['id'] == $id) {
                unset($keranjang[$key]);
                break;
            }
        }
        Session::put('keranjang', array_values($keranjang));
        return back();
    }

    public function kosongkan()
    {
        Session::forget('keranjang');
        return back();
    }
}
