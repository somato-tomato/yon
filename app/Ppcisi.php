<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppcisi extends Model
{
    protected $fillable = [
        'idPPC', 'namaMaterial', 'satuan', 'jumlahMaterial', 'sisaJumlahMaterial', 'satuanHarga', 'jumlahHarga', 'keterangan', 'vendor'
    ];
}
