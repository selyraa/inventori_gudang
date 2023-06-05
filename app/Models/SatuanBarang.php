<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    use HasFactory;
    protected $table = 'satuan_barangs';
    protected $primaryKey = 'idSatuan';
    protected $keyType = 'string';
    protected $fillable = [
        'idSatuan',
        'namaSatuan',
    ];
}