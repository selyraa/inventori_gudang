<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturBarang extends Model
{
    use HasFactory;
    protected $tabel = 'retur_barangs';
    protected $primaryKey = 'idRetur';
    protected $keyType = 'string';

    protected $fillable = [
        'idRetur',
        'idTransaksiMasuk',
        'idUser',
        'tglRetur',
    ];

    public function trmasuk()
    {
        return $this->belongsTo(TransaksiMasuk::class, 'idTransaksiMasuk');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
