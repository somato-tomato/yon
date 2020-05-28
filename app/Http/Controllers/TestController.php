<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function testGet($id)
    {
        $test = DB::table('ppcisis')
            ->where('idPPC', '=', $id)
            ->get();

        $plucked = $test->pluck('namaMaterial','id');

        return view('test2', compact('plucked'));
    }

    public function getTest($id)
    {
        $getTest = DB::table('ppcisis')
            ->where('id', $id)
            ->select('namaMaterial', 'satuan', 'jumlahMaterial', 'satuanHarga', 'jumlahHarga')
            ->first();

        return json_encode($getTest);
    }
}
