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

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'idSupplier');
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanBarang::class, 'idSatuan');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'idKategori');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
