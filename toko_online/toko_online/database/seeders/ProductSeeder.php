<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            ['id_barang' => 'BRG01', 'nama_barang' => 'Buku Tulis', 'deskripsi' => 'Buku tulis 58 halaman', 'harga' => 5000, 'stok' => 15, 'gambar' => 'buku.jpg'],
            ['id_barang' => 'BRG02', 'nama_barang' => 'Pulpen Gel Hitam', 'deskripsi' => 'Pulpen tinta gel anti macet', 'harga' => 3000, 'stok' => 25, 'gambar' => 'pulpen.jpg'],
            ['id_barang' => 'BRG03', 'nama_barang' => 'Penggaris 30cm', 'deskripsi' => 'Penggaris plastik transparan', 'harga' => 4000, 'stok' => 10, 'gambar' => 'penggaris.jpg'],
            ['id_barang' => 'BRG04', 'nama_barang' => 'Pensil 2B', 'deskripsi' => 'Pensil ujian komputer standar', 'harga' => 2500, 'stok' => 30, 'gambar' => 'pensil.jpg'],
            ['id_barang' => 'BRG05', 'nama_barang' => 'Penghapus Karet', 'deskripsi' => 'Penghapus lembut bersih', 'harga' => 1500, 'stok' => 20, 'gambar' => 'penghapus.jpg'],
            ['id_barang' => 'BRG06', 'nama_barang' => 'Buku Gambar A4', 'deskripsi' => 'Buku sketsa gambar putih bersih', 'harga' => 8000, 'stok' => 12, 'gambar' => 'bukugambar.jpg'],
            ['id_barang' => 'BRG07', 'nama_barang' => 'Spidol Warna', 'deskripsi' => 'Set spidol warna-warni cerah', 'harga' => 15000, 'stok' => 5, 'gambar' => 'spidol.jpg'],
            ['id_barang' => 'BRG08', 'nama_barang' => 'Tipe-X Kertas', 'deskripsi' => 'Pewarna koreksi jenis pita', 'harga' => 6000, 'stok' => 8, 'gambar' => 'tipex.jpg'],
            ['id_barang' => 'BRG09', 'nama_barang' => 'Gunting Kecil', 'deskripsi' => 'Gunting tajam bergagang plastik', 'harga' => 7000, 'stok' => 0, 'gambar' => 'gunting.jpg'],
            ['id_barang' => 'BRG10', 'nama_barang' => 'Stapler Sedang', 'deskripsi' => 'Hekter kertas ukuran sedang', 'harga' => 12000, 'stok' => 7, 'gambar' => 'stapler.jpg'],
        ]);
    }
}