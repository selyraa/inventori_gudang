<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;
    protected $table = 'kategori_barangs';
    protected $primaryKey = 'idKategori';
    protected $keyType = 'string';
    protected $fillable = [
        'idKategori',
        'namaKategori',
    ];
}
