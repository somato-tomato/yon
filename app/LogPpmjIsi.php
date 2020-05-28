<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPpmjIsi extends Model
{
    protected $fillable = [
        'idPPCIsi', 'idVendor', 'namaUser', 'inputMaterial', 'inputTanggal', 'keterangan'
    ];
}
