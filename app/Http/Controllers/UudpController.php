<?php

namespace App\Http\Controllers;

use App\Uudp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UudpController extends Controller
{
    public function index()
    {
        return view('logistik.logUudp.uudpDex');
    }

    public function getUUDP()
    {
        return Datatables::of(Uudp::query())
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-xs btn-success' href='$data->id/ppmjapp'>Lihat</a>";
            })
            ->rawColumns(['lihat'])->make(true);
    }

    public function buatUUDP()
    {
        return view('logistik.logUudp.uudpCre');
    }
}
