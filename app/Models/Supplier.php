<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $primaryKey = 'idSupplier';
    protected $keyType = 'string';

    protected $fillable = [
        'idSupplier',
        'nama',
        'alamat',
        'noTelp',
    ];
}
