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
}
