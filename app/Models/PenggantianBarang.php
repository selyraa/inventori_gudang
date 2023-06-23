<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggantianBarang extends Model
{
    use HasFactory;

    protected $tabel = 'penggantian_barangs';
    protected $primaryKey = 'idPenggantianBarang';
    protected $keyType = 'string';

    protected $fillable = [
        'idPenggantianBarang',
        'idDetailRetur',
        'jumlahPenggantian',
        'selisihRetur',
        'penguranganProfit',
        'keterangan',
        'tglPenggantian',
    ];

    public function detailretur()
    {
        return $this->belongsTo(DetailRetur::class, 'idDetailRetur');
    }
}
