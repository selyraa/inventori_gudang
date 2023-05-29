<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'idBarang';
    protected $keyType = 'string';

    protected $fillable = [
        'idBarang',
        'idSupplier',
        'idUser',
        'idSatuan',
        'idKategori',
        'namaBarang',
        'fotoProduk',
    ];

    public function detailbarang()
    {
        return $this->hasMany(DetailBarang::class, 'idBarang');
    }
    
}
