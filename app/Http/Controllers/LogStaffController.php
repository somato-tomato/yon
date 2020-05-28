<?php

namespace App\Http\Controllers;

use App\LogPpmjPo;
use App\Ppc;
use App\Ppcisi;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Terbilang;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LogStaffController extends Controller
{
    public function pmtPO()
    {
        return view('logistik.logStaff.pmtPODex');
    }

    public function pmtPOData()
    {
        $ppmj = DB::table('ppcs')
            ->select('id', 'tanggalPPMJ', 'nomorPPMJ', 'nomorPO', 'pemesan', 'namaOrder')
            ->where('cekLogistik', '=', 'PMT')
            ->get();

        return DataTables::of($ppmj)
            ->addColumn('lihat', function($data) {
                return '<a class="btn btn-xs btn-success" href="' . route('logstaff.pmtPOShow', $data->id) .'">Lihat</a>';
            })
            ->rawColumns(['lihat'])
            ->make(true);
    }

    public function pmtPOShow($id)
    {
        $ppmj = Ppc::findOrFail($id);

        $add = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->join('vendors', 'ppcisis.vendor', '=', 'vendors.id')
            ->select( 'ppcisis.idPPC', 'ppcisis.vendor', 'ppcisis.idPO', 'vendors.namaVendor', DB::raw('count(ppcisis.vendor) as sudah'))
            ->where([['ppcs.id', '=', $id], ['vendor', '!=', '1']])
            ->groupBy('namaVendor')
            ->get();

        return view('logistik.logStaff.pmtPOShow', compact('ppmj', 'add'));
    }

    public function pmtPOCreate($vendor, $id)
    {
        $ppmj = DB::table('ppcs')
            ->select('id', 'nomorPPMJ', 'tanggalPPMJ')
            ->where('id', '=', $id)
            ->first();
        $vendors = DB::table('vendors')
            ->where('id', '=' , $vendor)
            ->first();
        $isi = DB::table('ppcisis')
            ->select('id', 'namaMaterial', 'satuan', 'jumlahMaterial', 'satuanHarga', 'jumlahHarga')
            ->where([
                ['idPPC', '=', $id],
                ['vendor', '=' , $vendor],
                ['idPO', '=', null]
            ])
            ->get();

        $count = DB::table('ppcisis')
            ->select(DB::raw('count(vendor) as sisa') )
            ->where([
                ['idPPC', '=', $id],
                ['vendor', '=' , $vendor],
                ['idPO', '=', null]
            ])
            ->first();

        return view('logistik.logStaff.pmtPOCre', compact('ppmj', 'vendors', 'isi', 'count'));
    }

    public function pmtPOSave(Request $request)
    {
        $request->validate([
            'noPO' => 'required',
            'tglPO' => 'required',
            'tempatPenyerahan' => 'required',
            'waktuPenyerahan' => 'required',
            'ketPembayaran' => 'required'
        ]);

        $form_data = array(
            'idPPC' => $request->idPPC,
            'idVendor' => $request->idVendor,
            'noPO' => $request->noPO,
            'tglPO' => $request->tglPO,
            'tempatPenyerahan' => $request->tempatPenyerahan,
            'waktuPenyerahan' => $request->waktuPenyerahan,
            'ketPembayaran' => $request->ketPembayaran,
            'dasar' => $request->dasar,
            'dasarTanggal' => $request->dasarTanggal,
        );

        $names = $request->namaMaterial;
        $id = $request->id;
        $choose = $request->choose;

        LogPpmjPo::create($form_data);

        $idPO = DB::table('log_ppmj_pos')
            ->select('id')
            ->where([['idPPC', '=', $request->idPPC], ['idVendor', '=', $request->idVendor]])
            ->latest()->first();

        foreach ($names as $index => $name) {
            if ( $choose[$index] == 'yes') {
                Ppcisi::where('id', $id[$index])
                    ->update(['idPO' => $idPO->id]);
            }
        }

        $total = DB::table('ppcisis')
            ->where('idPO', '=', $idPO->id)
            ->sum('jumlahHarga');

        DB::table('log_ppmj_pos')
            ->where('id', $idPO->id)
            ->update(['totalHarga' => $total]);

//        Ppc::where('id', $request->idPPC)
//            ->update(['cekStaffLog' => $idPO->id]);
        return redirect()->route('logstaff.pmtPOShow', $request->idPPC)->with('message', 'PO Created');
    }

    public function pmtPODetailed($vendor, $id)
    {
        $ppmj = Ppc::findOrFail($id);

        $vendors = DB::table('vendors')
            ->where('id', '=' , $vendor)
            ->first();

        $dataPO = DB::table('ppcisis')
            ->join('log_ppmj_pos', 'ppcisis.idPO', '=', 'log_ppmj_pos.id')
            ->select('ppcisis.vendor', 'ppcisis.idPPC', 'log_ppmj_pos.id', 'log_ppmj_pos.noPO', 'log_ppmj_pos.tglPO', 'log_ppmj_pos.totalHarga')
            ->where('ppcisis.vendor', '=', $vendor)
            ->groupBy('log_ppmj_pos.noPO')->get();

        return view('logistik.logStaff.pmtPODetailed', compact('ppmj', 'vendors', 'dataPO'));
    }

    public function unduhPO($vendor, $idPO, $id)
    {
        $ppmj = DB::table('ppcs')
            ->select('id', 'nomorPPMJ', 'tanggalPPMJ')
            ->where('id', '=', $id)
            ->first();
        $vendors = DB::table('vendors')
            ->where('id', '=' , $vendor)
            ->first();
        $po = DB::table('log_ppmj_pos')
            ->select('noPO', 'tglPO', 'waktuPenyerahan', 'tempatPenyerahan', 'ketPembayaran', 'dasar', 'dasarTanggal', 'totalHarga')
            ->where('id', '=', $idPO)
            ->first();
        $isi = DB::table('ppcisis')
            ->select('namaMaterial', 'satuan', 'jumlahMaterial', 'satuanHarga', 'jumlahHarga')
            ->where('idPO', '=', $idPO)
            ->get();

        $terbilang = Terbilang::make($po->totalHarga, ' rupiah', 'terbilang : ');

        $up = Str::upper($terbilang);

        $time = Carbon::now()->toTimeString();

        $pdf = PDF::loadView('logistik.logStaff.pdfPO', compact('ppmj', 'vendors', 'isi', 'po', 'up'))->setPaper('a4');
        return $pdf->download($po->noPO.'_'.$time.'.pdf');
    }
}
