<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;

class HomeController extends Controller
{
    //TRANSAKSI
    public function transaksi(){
        $transaksi = Penjualan::all();
        return view('admin.transaksi.transaksi',compact('transaksi'));
    }

    public function getProduk($id){
        $produk = Produk::find($id);
        if(!$produk){
            return response()->json([
                'error' => true,
                'messsage' => 'Produk Tidak Ditemukan',
            ], 404);
        }
        return response()->json($produk);
    }

    public function getMember($id){
        $pelanggan = Pelanggan::find($id);
        if(!$pelanggan){
            return response()->json([
                'error' => true,
                'message' => 'Pelanggan Tidak Ditemukan',
            ], 404);
        }
        return response()->json([
            'error' => false,
            'data' => $pelanggan,
            'discount' => 5 // Tambahkan nilai default diskon member
        ]);
    }

    //PRODUK
    public function produk(){
        $produk = Produk::all();
        return view('admin.produk.data_produk',compact('produk'));
    }

    public function tambah_produk(){
        return view('admin.produk.tambah_produk');
    }
    function tambah_produk_proses(Request $request){
        $kode = $request->input('id_produk');
        $nama = $request->input('nama_produk');
        $harga = $request->input('harga');
        $stok = $request->input('stok');

        if($kode <= 0){
            return redirect('/tambah_produk')->with('error','Kode Produk Tidak Boleh Kosong');
        }elseif($kode > 0){
            $check  = Produk::where('ProdukID',$kode)->first();
            if($check){
                return redirect('/tambah_produk')->with('error','Kode Produk Sudah Digunakan');
            }
        }

        $query = new Produk;
        $query->ProdukID = $kode;
        $query->NamaProduk = $nama;
        $query->Harga = $harga;
        $query->Stok = $stok;
        $query->save();

        if($query){
            return redirect('/produk')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect('/tambah_produk')->with('error','Data Gagal Ditambahkan');
        }
    }

    public function edit_produk($id){
        $produk = Produk::where('ProdukID',$id)->first();
        return view('admin.produk.edit_produk',compact('produk'));
    }
    function edit_produk_proses(Request $request){
        $kode = $request->input('id_produk');
        $nama = $request->input('nama_produk');
        $harga = $request->input('harga');
        $stok = $request->input('stok');

        $query = Produk::where('ProdukID',$kode)->first();
        $query->NamaProduk = $nama;
        $query->Harga = $harga;
        $query->Stok = $stok;
        $query->save();
        if($query){
            return redirect('/produk')->with('success','Data Berhasil Diubah');
        }else{
            return redirect('/edit_produk')->with('error','Data Gagal Diubah');
        }
    }

    public function hapus_produk(Request $request){
        $id = $request->input('id_produk');
        $query = Produk::where('ProdukID',$id)->delete();
        if($query){
            return redirect('/produk')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect('/produk')->with('error','Data Gagal Dihapus');
        }
    }

    //PELANGGAN
    public function pelanggan(){
        $pelanggan = Pelanggan::all();
        return view('admin.pelanggan.pelanggan',compact('pelanggan'));
    }

    public function tambah_pelanggan(){
        return view('admin.pelanggan.tambah_pelanggan');
    }
    function tambah_pelanggan_proses(Request $request){
        $id = $request->input('id_pelanggan');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_hp = $request->input('telp');

        if($id <= 0){
            return redirect('/tambah_pelanggan')->with('error','ID Pelanggan Tidak Boleh Kosong');
        }elseif($id > 0){
            $check  = Pelanggan::where('PelangganID',$id)->first();
            if($check){
                return redirect('/tambah_pelanggan')->with('error','ID Pelanggan Sudah Digunakan');
            }
        }

        $query = new Pelanggan;
        $query->PelangganID = $id;
        $query->NamaPelanggan = $nama;
        $query->Alamat = $alamat;
        $query->NomorTelepon = $no_hp;
        $query->save();
        if($query){
            return redirect('/pelanggan')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect('/tambah_pelanggan')->with('error','Data Gagal Ditambahkan');
        }
    }

    public function edit_pelanggan($id){
        $pelanggan = Pelanggan::where('PelangganID',$id)->first();
        return view('admin.pelanggan.edit_pelanggan',compact('pelanggan'));
    }
    function edit_pelanggan_proses(Request $request){
        $id = $request->input('id_pelanggan');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_hp = $request->input('telp');

        $query = Pelanggan::where('PelangganID',$id)->first();
        $query->NamaPelanggan = $nama;
        $query->Alamat = $alamat;
        $query->NomorTelepon = $no_hp;
        $query->save();
        if($query){
            return redirect('/pelanggan')->with('success','Data Berhasil Diubah');
        }else{
            return redirect('/edit_pelanggan')->with('error','Data Gagal Diubah');
        }
    }

    public function hapus_pelanggan(Request $request){
        $id = $request->input('id_pelanggan');
        $query = Pelanggan::where('PelangganID',$id)->delete();
        if($query){
            return redirect('/pelanggan')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect('/pelanggan')->with('error','Data Gagal Dihapus');
        }
    }

    //DETAIL PENJUALAN
    public function penjualan()
    {
        $penjualan = Penjualan::with(['pelangganRelasi'])
                    ->orderBy('TanggalPenjualan', 'desc')
                    ->get();
        return view('admin.penjualan.data_penjualan', compact('penjualan'));
    }

    public function simpanTransaksi(Request $request)
    {
        try {
            $data = $request->all();
            
            // Generate nomor nota unik
            $today = now()->format('dmY');
            $lastPenjualan = Penjualan::where('NoNota', 'like', "TRX{$today}%")
                ->orderBy('NoNota', 'desc')
                ->first();
                
            if ($lastPenjualan) {
                $lastNumber = (int) substr($lastPenjualan->NoNota, -4);
                $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }
            
            $noNota = "TRX{$today}{$newNumber}";
            
            // Hitung total setelah diskon
            $subtotal = $data['totalHarga'];
            $discount = isset($data['discountRate']) ? ($subtotal * $data['discountRate'] / 100) : 0;
            $finalTotal = $subtotal - $discount;
            
            // Buat record penjualan baru dengan total setelah diskon
            $penjualan = new Penjualan();
            $penjualan->PenjualanID = $noNota;
            $penjualan->NoNota = $noNota;
            $penjualan->TotalHarga = $finalTotal; // Simpan total setelah diskon
            $penjualan->PelangganID = $data['pelangganId'] ?? null;
            $penjualan->TanggalPenjualan = now();
            $penjualan->save();

            // Simpan detail penjualan
            foreach ($data['items'] as $item) {
                $detail = new DetailPenjualan();
                $detail->PenjualanID = $noNota;
                $detail->ProdukID = $item['produkId'];
                $detail->JumlahProduk = $item['jumlah'];
                $detail->Subtotal = $item['subtotal'];
                $detail->save();

                // update stok produk
                $produk = Produk::find($item['produkId']);
                $produk->Stok -= $item['jumlah'];
                $produk->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil disimpan',
                'noNota' => $noNota
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function hapus_penjualan(Request $request){
        $id = $request->input('penjualan_id');
        $query = Penjualan::where('PenjualanID',$id)->delete();
        if($query){
            return redirect('/penjualan')->with('success','Data Berhasil Dihapus');
        } else{
            return redirect('/penjualan')->with('error','Data Gagal Dihapus');
        }
    }

    public function detail_penjualan($id)
    {
        $detail = DetailPenjualan::with(['penjualanRelasi', 'produkRelasi'])
            ->where('PenjualanID', $id)
            ->get();

        if ($detail->isEmpty()) {
            return redirect('/penjualan')->with('error', 'Detail penjualan tidak ditemukan');
        }

        return view('admin.penjualan.detail_penjualan', compact('detail'));
    }

    public function laporan(){
        $penjualan = Penjualan::with(['pelangganRelasi'])
                 ->orderBy('TanggalPenjualan', direction: 'desc')
                 ->get();
        return view('admin.penjualan.laporan', compact('penjualan'));
    }

    public function filterLaporan(Request $request) {
        $startDate = $request->start_date . ' 00:00:00';  // Tambahkan waktu awal hari
        $endDate = $request->end_date . ' 23:59:59';      // Tambahkan waktu akhir hari

        $penjualan = Penjualan::with(['pelangganRelasi'])
                     ->whereBetween('TanggalPenjualan', [$startDate, $endDate])
                     ->orderBy('TanggalPenjualan', 'desc')
                     ->get();

        return response()->json($penjualan);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $penjualan = Penjualan::with(['pelangganRelasi'])
            ->where('NoNota', 'like', "%{$search}%")
            ->orderBy('TanggalPenjualan', 'desc')
            ->get();
        return view('admin.penjualan.data_penjualan', compact('penjualan'));
    }

    public function searchProduk(Request $request){
        $search = $request->input('search_produk');
        $produk = Produk::where('NamaProduk', 'like', "%{$search}%")
            ->orWhere('ProdukID', 'like', "%{$search}%")
            ->get();
        return view('admin.produk.data_produk',compact('produk'));
    }

}
