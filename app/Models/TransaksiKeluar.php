<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKeluar extends Model
{
    use HasFactory;
    protected $table = 'transaksi_keluars';
    protected $primaryKey = 'idTransaksiKeluar';
    protected $keyType = 'string';
    protected $fillable = [
        'idTransaksiKeluar',
        'idUser',
        'idToko',
        'tglTransaksiKeluar',
    ];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'idToko');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
