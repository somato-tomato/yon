<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashPPC()
    {
        if (Auth::user()->role === "ppcMan")
        {
            $man = 'Manager PPC';
        } else {
            $man = 'Staff PPC';
        }

        $nyapp = DB::table('ppcs')
            ->where('cekManager', '=', 0)
            ->count();

        $hbapp = DB::table('ppcs')
            ->where('cekManager', '=', 1)
            ->count();

        $hbrej = DB::table('ppcs')
            ->where('cekManager', '=', 2)
            ->count();

        return view('ppc.dashboard', compact('nyapp', 'hbapp', 'hbrej', 'man'));
    }

    public function dashLog()
    {
        if (Auth::user()->role === "logMan")
        {
            $man = 'Manager Logistik';
        } else {
            $man = 'Staff Logistik';
        }

        $approved = DB::table('ppcs')
            ->where('cekManager', '=', 1)
            ->count();

        $pmt = DB::table('ppcs')
            ->where('cekLogistik', '=', 'PMT')
            ->count();

        $spk = DB::table('ppcs')
            ->where('cekLogistik', '=', 'SPK')
            ->count();

        $sjan = DB::table('ppcs')
            ->where('cekLogistik', '=', 'SJAN')
            ->count();

        return view('logistik.dashboard', compact('man', 'approved', 'pmt', 'spk', 'sjan'));
    }

    public function dashGud()
    {
        return view('gudang.dashboard');
    }
}
