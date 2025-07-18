<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table = 'detailpenjualan';
    protected $primaryKey = 'DetailID';
    protected $fillable = ['PenjualanID', 'ProdukID', 'JumlahProduk', 'Subtotal'];

    public function penjualanRelasi(){
        return $this->belongsTo(Penjualan::class, 'PenjualanID', 'PenjualanID');
    }

    public function produkRelasi(){
        return $this->belongsTo(Produk::class, 'ProdukID', 'ProdukID');
    }
}
