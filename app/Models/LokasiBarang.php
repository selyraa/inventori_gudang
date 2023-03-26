<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiBarang extends Model
{
    use HasFactory;
    protected $table = 'lokasi_barangs';
    protected $primaryKey = 'idRak';
    protected $keyType = 'string';
}
