<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeluar extends Model
{
    use HasFactory;
    protected $table = 'detail_keluars';
    protected $primaryKey = 'idDetailKeluar';
    protected $keyType = 'string';
    protected $fillable = [
        'idDetailKeluar',
        'idTransaksiKeluar',
        'idDetailBarang',
        'jumlah',
    ];

    public function detailbarang()
    {
        return $this->belongsTo(DetailBarang::class, 'idDetailBarang', 'idDetailBarang');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
