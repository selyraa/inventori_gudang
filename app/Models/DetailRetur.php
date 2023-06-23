<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRetur extends Model
{
    use HasFactory;
    protected $table = 'detail_returs';
    protected $primaryKey = 'idDetailRetur';
    protected $keyType = 'string';

    protected $fillable = [
        'idDetailRetur',
        'idRetur',
        'idDetailBarang',
        'jumlah',
    ];
    public function retur()
    {
        return $this->belongsTo(ReturBarang::class, 'idRetur');
    }

    public function detailbarang()
    {
        return $this->belongsTo(DetailBarang::class, 'idDetailBarang');
    }

}
