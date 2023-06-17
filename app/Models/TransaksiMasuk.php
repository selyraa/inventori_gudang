<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;


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

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'idSupplier', 'idSupplier');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
