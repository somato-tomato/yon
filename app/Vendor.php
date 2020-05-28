<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'idUser', 'namaVendor', 'alamatVendor', 'alamatVendor2', 'telepon', 'awalKontrak', 'akhirKontrak'
    ];
}
