<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PpcAcc extends Model
{
    protected $fillable=[
        'idUser', 'idPPC', 'approved', 'notApproved', 'keterangan'
    ];
}
