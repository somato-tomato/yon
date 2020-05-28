<?php

namespace App\Http\Controllers;

use App\LogPpmjIsi;
use App\Ppc;
use App\Ppcisi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GudStaffController extends Controller
{
    public function StaffPPMJShow($id)
    {
        $ppmj = Ppc::findOrFail($id);
        $add = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->join('vendors', 'ppcisis.vendor', '=', 'vendors.id')
            ->select('ppcisis.id', 'ppcisis.namaMaterial', 'ppcisis.jumlahMaterial', 'ppcisis.sisaJumlahMaterial', 'ppcisis.satuan', 'ppcisis.vendor', 'vendors.namaVendor')
            ->where([['ppcs.id', '=', $id], ['vendors.namaVendor', '!=', 'Vendor Belum di Pilih']])
            ->get();


        return view('gudang.gudStaff.staffPPMJShow', compact('ppmj', 'add'));
    }

    public function StaffPPMJDetailed($id)
    {
        $isippmj = Ppcisi::findOrFail($id);
        $ppmj = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcs.id', 'ppcs.nomorPPMJ', 'ppcs.cekLogistik')
            ->where('ppcisis.id', '=', $id)
            ->first();
        $detailed = DB::table('ppcisis')
            ->join('log_ppmj_isis', 'ppcisis.id', '=', 'log_ppmj_isis.idPPCIsi')
            ->join('vendors', 'ppcisis.vendor', '=', 'vendors.id')
            ->select('vendors.namaVendor', 'log_ppmj_isis.namaUser', 'log_ppmj_isis.inputMaterial', 'log_ppmj_isis.inputTanggal')
            ->where('ppcisis.id', '=', $id)
            ->get();

        return view('gudang.gudStaff.staffPPMJDetailed', compact('isippmj','ppmj', 'detailed'));
    }

    public function StaffPPMJAdd(Request $request)
    {
        $request->validate([
            'inputMaterial' => 'required'
        ]);

        $form_data = array(
            'idPPCIsi' => $request->idPPCIsi,
            'idVendor' => $request->idVendor,
            'idUser' => Auth::user()->name,
            'inputMaterial' => $request->inputMaterial,
            'inputTanggal' => Carbon::now(),
            'keterangan' => $request->keterangan,
        );

        $jumlahMaterial = DB::table('ppcisis')
            ->select('jumlahMaterial')
            ->where('id', '=', $request->idPPCIsi)
            ->first();

        if ($request->inputMaterial <= $jumlahMaterial->jumlahMaterial)
        {
            LogPpmjIsi::create($form_data);
            $kurang = $jumlahMaterial->jumlahMaterial - $request->inputMaterial;
            Ppcisi::whereId($request->idPPCIsi)->update(['sisaJumlahMaterial' => $kurang]);
            return back()->with('message', 'Input Material Berhasil');
        } else {
            return back()->with('error', 'Input Material melebihi Jumlah Material');
        }
    }

    public function staffPMTDex()
    {
        $po = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcisis.idPO')
            ->where('cekLogistik', '=', 'PMT')
            ->get();

        return view('gudang.gudStaff.pmtDex', compact('po'));
    }

    public function dataPMTDex()
    {
        $pmt = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcs.id', 'ppcs.tanggalPPMJ', 'ppcs.nomorPPMJ', 'ppcs.nomorPO', 'ppcs.pemesan', 'ppcs.namaOrder', DB::raw('count(if(ppcisis.vendor != 1, 0, NULL)) as sudah'), DB::raw('count(if(ppcisis.vendor = 1, 0, NULL)) as belum'))
            ->where('cekLogistik', '=', 'PMT')
            ->groupBy('ppcs.id')
            ->get();
        return Datatables::of($pmt)
            ->editColumn('sudah', function($data) {
                return "<button class='btn btn-success'>$data->sudah</button>";
            })
            ->editColumn('belum', function($data) {
                return "<button class='btn btn-danger'>$data->belum</button>";
            })
//            ->addColumn('lihat', function ($data) {
//                if ($data->cekStaffLog == null)
//                    return "<a class='btn btn-xs btn-warning' href='javascript:void0'>PO Belum</a>";
//                return "<a class='btn btn-xs btn-success' href='$data->id/details'>Lihat</a>";
//            })
            ->rawColumns(['sudah', 'belum'])->make(true);
    }

    public function staffSPKDex()
    {
        return view('gudang.gudStaff.spkDex');
    }

    public function dataSPKDex()
    {
        $spk = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcs.id', 'ppcs.tanggalPPMJ', 'ppcs.nomorPPMJ', 'ppcs.nomorPO', 'ppcs.pemesan', 'ppcs.namaOrder', DB::raw('count(if(ppcisis.vendor != 1, 0, NULL)) as sudah'), DB::raw('count(if(ppcisis.vendor = 1, 0, NULL)) as belum'))
            ->where('cekLogistik', '=', 'SPK')
            ->groupBy('ppcs.id')
            ->get();

        return Datatables::of($spk)
            ->editColumn('sudah', function($data) {
                return "<button class='btn btn-success'>$data->sudah</button>";
            })
            ->editColumn('belum', function($data) {
                return "<button class='btn btn-danger'>$data->belum</button>";
            })
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-xs btn-success' href='$data->id/details'>Lihat</a>";
            })
            ->rawColumns(['sudah', 'belum', 'lihat'])->make(true);
    }

    public function staffSJANDex()
    {
        return view('gudang.gudStaff.sjanDex');
    }

    public function dataSJANDex()
    {
        $sjan = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcs.id', 'ppcs.tanggalPPMJ', 'ppcs.nomorPPMJ', 'ppcs.nomorPO', 'ppcs.pemesan', 'ppcs.namaOrder', DB::raw('count(if(ppcisis.vendor != 1, 0, NULL)) as sudah'), DB::raw('count(if(ppcisis.vendor = 1, 0, NULL)) as belum'))
            ->where('cekLogistik', '=', 'SJAN')
            ->groupBy('ppcs.id')
            ->get();

        return Datatables::of($sjan)
            ->editColumn('sudah', function($data) {
                return "<button class='btn btn-success'>$data->sudah</button>";
            })
            ->editColumn('belum', function($data) {
                return "<button class='btn btn-danger'>$data->belum</button>";
            })
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-xs btn-success' href='$data->id/detail'>Lihat</a>";
            })
            ->rawColumns(['sudah', 'belum', 'lihat'])->make(true);
    }
}
