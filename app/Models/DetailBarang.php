<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    use HasFactory;
    protected $table = 'detail_barangs';
    protected $primaryKey = 'idDetailBarang';
    protected $keyType = 'string';
}
