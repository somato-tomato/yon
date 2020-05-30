<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uudp extends Model
{
    protected $fillable = [
        'tglUUDP', 'noUUDP', 'kepada', 'lampiran', 'perihal', 'jenisBeli', 'uuid'
    ];
}
