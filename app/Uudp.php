<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uudp extends Model
{
    protected $fillable = [
        'idUser', 'tglUUDP', 'noUUDP', 'kepada', 'lampiran', 'perihal', 'jenisBeli', 'uuid'
    ];
}
