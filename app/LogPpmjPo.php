<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPpmjPo extends Model
{
    protected $fillable = [
        'idPPC', 'idVendor', 'noPO', 'tglPO', 'tempatPenyerahan', 'waktuPenyerahan', 'ketPembayaran', 'dasar', 'dasarTanggal', 'totalHarga', 'uploadDoc'
    ];
}
