<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppc extends Model
{
    protected $fillable = [
        'nomorPPMJ', 'tanggalPPMJ', 'tanggalPO', 'dasarPP', 'tanggalPP', 'tujuanSurat', 'pemesan', 'namaOrder', 'nomorPO', 'jumlahOrder', 'cekManager', 'idManager', 'cekLogistik', 'approved'
    ];
}
