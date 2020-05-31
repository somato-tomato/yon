<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uudp extends Model
{
//    protected $primaryKey = 'uuid';
    protected $fillable = [
        'idUser', 'tglUUDP', 'noUUDP', 'kepada', 'lampiran', 'perihal', 'jenisBeli', 'uuid'
    ];
}
