<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPpmjAcc extends Model
{
    protected $table = 'log_ppmj_accs';
    protected $fillable = [
        'idUser', 'idPPC', 'keterangan'
    ];
}
