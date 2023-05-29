<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiMasuk extends Model
{
    use HasFactory;
    protected $table = 'transaksi_masuks';
    protected $primaryKey = 'idTransaksiMasuk';
    protected $keyType = 'string';

    protected $fillable = [
        'idTransaksiMasuk',
        'idUser',
        'idSupplier',
        'tglTransaksiMasuk',
    ];

    public function detailMasuks()
    {
        return $this->hasMany(DetailMasuk::class, 'idTransaksiMasuk');
    }
}
