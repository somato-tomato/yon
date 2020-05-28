<?php

namespace App\Http\Controllers;

use App\LogPpmjAcc;
use App\Ppc;
use App\Ppcisi;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LogManController extends Controller
{
    public function PpmjApp()
    {
        return view('logistik.logMan.ppcDex');
    }

    public function dataPpmjApp()
    {
        $data = DB::table('ppcs')
            ->join('ppc_accs', 'ppcs.id','=', 'ppc_accs.idPPC')
            ->join('users', 'ppc_accs.idUser', '=', 'users.id')
            ->select('users.name', 'ppcs.tanggalPPMJ', 'ppcs.nomorPPMJ', 'ppcs.nomorPO', 'ppcs.pemesan', 'ppcs.namaOrder', 'ppcs.id')
            ->where([
                ['ppcs.cekManager', '=', 1],
                ['ppcs.cekLogistik', '=', 'NotYetApp']
            ])
            ->get();

        return Datatables::of($data)
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-xs btn-success' href='$data->id/ppmjapp'>Lihat</a>";
            })
            ->rawColumns(['lihat'])->make(true);
    }

    public function PpmjAppShow($id)
    {
        $nyapp = Ppc::findOrFail($id);
        $add = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcisis.namaMaterial', 'ppcisis.satuan', 'ppcisis.jumlahMaterial', 'ppcisis.satuanHarga', 'ppcisis.jumlahHarga')
            ->where('ppcs.id', '=', $id)
            ->get();

        $jumlah = $add->sum('jumlahHarga');

        return view('logistik.logMan.ppcShow', compact('nyapp', 'add', 'jumlah'));
    }

    public function updatePpmj(Request $request, $id)
    {
        $check = DB::table('ppcs')
            ->select('cekLogistik')
            ->where('id', '=', $id)
            ->first();

        if ($check->cekLogistik === 'NotYetApp'){
            if ($request->get('save_action') == 'PMT'){
                Ppc::whereId($id)->update(['cekLogistik' => 'PMT']);
                return redirect()->route('logman.Ppmjin')->with('message', 'PPMJ approved to PMT');
            } elseif ($request->get('save_action') == 'SPK') {
                Ppc::whereId($id)->update(['cekLogistik' => 'SPK']);
                return redirect()->route('logman.Ppmjin')->with('message', 'PPMJ approved to SPK');
            } else {
                Ppc::whereId($id)->update(['cekLogistik' => 'SJAN']);
                return redirect()->route('logman.Ppmjin')->with('message', 'PPMJ approved to SJAN');
            }
        } else {
            abort(404);
        }
    }

    public function PMTDex()
    {
        return view('logistik.logman.pmtDex');
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
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-xs btn-success' href='$data->id/detail'>Lihat</a>";
            })
            ->rawColumns(['sudah', 'belum', 'lihat'])->make(true);
    }

    public function SPKDex()
    {
        return view('logistik.logMan.spkDex');
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
                return "<a class='btn btn-xs btn-success' href='$data->id/detail'>Lihat</a>";
            })
            ->rawColumns(['sudah', 'belum', 'lihat'])->make(true);
    }

    public function SJANDex()
    {
        return view('logistik.logman.sjanDex');
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

    public function PPMJShow($id)
    {
        $ppmj = Ppc::findOrFail($id);
        $add = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->join('vendors', 'ppcisis.vendor', '=', 'vendors.id')
            ->select( 'ppcisis.id', 'ppcisis.namaMaterial', 'ppcisis.satuan', 'ppcisis.jumlahMaterial', 'ppcisis.satuanHarga', 'ppcisis.jumlahHarga', 'ppcisis.keterangan', 'ppcisis.vendor', 'vendors.namaVendor', 'vendors.akhirKontrak')
            ->where('ppcs.id', '=', $id)
            ->get();

        $d = Carbon::now()->toDateString();

        $vendor = DB::table('vendors')
            ->whereDate('akhirKontrak', '>=', $d)
            ->pluck('namaVendor','id');

        return view('logistik.logMan.ppmjShow', compact('ppmj','add', 'vendor'));
    }

    public function PPMJUpdate(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'vendor' => 'required'
        ]);

        $form_data = array(
            'vendor' => $request->vendor,
            'sisaJumlahMaterial' => $request->sisaJumlahMaterial
        );

        Ppcisi::whereId($request->id)->update($form_data);

        return back()->with('message', 'Vendor berhasil Tambahkan');
    }

//    public function testPDF()
//    {
//        $pdf = PDF::loadView('testi')->setPaper('a4');
//        return $pdf->download('asdasdaasdasdasd.pdf');
//    }
}
