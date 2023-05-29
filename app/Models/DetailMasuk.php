<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMasuk extends Model
{
    use HasFactory;
    protected $table = 'detail_masuks';
    protected $primaryKey = 'idDetailMasuk';
    protected $keyType = 'string';
    protected $fillable = [
        'idDetailMasuk',
        'idTransaksiMasuk',
        'idDetailBarang',
        'jumlah',
    ];

    public function detailBarang()
    {
        return $this->belongsTo(DetailBarang::class, 'idDetailBarang');
    }



    public function trmasuk()
    {
        return $this->belongsTo(TransaksiMasuk::class, 'idTransaksiMasuk', 'idTransaksiMasuk');
    }
}
