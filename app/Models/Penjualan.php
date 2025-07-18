<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'PenjualanID';
    protected $fillable = ['TotalHarga', 'PelangganID', 'TanggalPenjualan', 'NoNota'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function pelangganRelasi(){
        return $this->belongsTo(Pelanggan::class, 'PelangganID', 'PelangganID');
    }
}
