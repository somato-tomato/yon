<?php

namespace App\Http\Controllers;

use App\Ppc;
use App\Uudp;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
                return "<a class='btn btn-xs btn-success' href='/logistik/uudp/$data->uuid/lihat'>Lihat</a>";
            })
            ->rawColumns(['lihat'])->make(true);
    }

    public function buatUUDP()
    {
        return view('logistik.logUudp.uudpCre');
    }

    public function loadPPMJ(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("ppcs")
                ->select("id","nomorPPMJ")
                ->where([['nomorPPMJ','LIKE',"%$search%"],['idUUDP', '=', null],['cekManager', '=', 1]])
                ->get();
        }

        return response()->json($data);
    }

    public function saveUUDP(Request $request)
    {
        $request->validate([
            'tglUUDP' => 'required',
            'noUUDP' => 'required|unique:uudps',
            'kepada' => 'required',
            'perihal' => 'required',
            'jenisBeli' => 'required',
            'categories.*' => 'required'
        ]);

        $form_data = array(
            'idUser' => Auth::user()->getAuthIdentifier(),
            'tglUUDP' => $request->tglUUDP,
            'noUUDP' => $request->noUUDP,
            'kepada' => $request->kepada,
            'perihal' => $request->perihal,
            'jenisBeli' => $request->jenisBeli,
            'uuid' => (string) Str::uuid()
        );

        Uudp::create($form_data);

        $id = DB::table('uudps')
            ->select('id')
            ->where('noUUDP', '=', $request->noUUDP)
            ->first();

        foreach ($request->categories as $key => $value) {
            Ppc::whereId($value)->update(['idUUDP' => $id->id]);
        }

        $count = DB::table('ppcs')
            ->select(DB::raw('count(idUUDP) as lampiran') )
            ->where('idUUDP', '=', $id->id)
            ->first();

        DB::table('uudps')
            ->where('id', '=', $id->id)
            ->update(['lampiran' => $count->lampiran]);

        return redirect()->route('logUudp.uudp')->with('message', 'UUDP Berhasil dibuat');
    }

    public function showUUDP($uuid)
    {
        $uudp = DB::table('uudps')
            ->select('id', 'tglUUDP', 'noUUDP', 'kepada', 'perihal', 'jenisBeli', 'uuid')
            ->where('uuid', '=', $uuid)
            ->first();
        $ppmj = DB::table('ppcs')
            ->join('uudps', 'ppcs.idUUDP', '=', 'uudps.id')
            ->select(
                'ppcs.nomorPPMJ', 'ppcs.tanggalPO', 'ppcs.tujuanSurat', 'ppcs.pemesan', 'ppcs.namaOrder', 'ppcs.nomorPO', 'ppcs.ppn'
            )->where('ppcs.idUUDP', '=', $uudp->id)->get();

//        ddd($uudp);

        return view('logistik.logUudp.uudpSho', compact('uudp', 'ppmj'));
    }

    public function showPPN($uuid)
    {
        $uudp = DB::table('uudps')
            ->select('id', 'uuid')
            ->where('uuid', '=', $uuid)
            ->first();
//        ddd($uudp);
        $ppmj = DB::table('ppcs')
            ->join('uudps', 'ppcs.idUUDP', '=', 'uudps.id')
            ->select(
                'ppcs.id', 'ppcs.nomorPPMJ', 'ppcs.tanggalPPMJ', 'ppcs.tanggalPO', 'ppcs.dasarPP', 'ppcs.tanggalPP', 'ppcs.tujuanSurat', 'ppcs.pemesan', 'ppcs.namaOrder', 'ppcs.nomorPO', 'ppcs.jumlahOrder',
            )->where('ppcs.idUUDP', '=', $uudp->id)->get();

        return view('logistik.logUudp.uudpPpn', compact('ppmj', 'uudp'));
    }

    public function upPPN(Request $request)
    {
        $ids = $request->id;
        $ppns = $request->ppn;
        $uuid = $request->uuid;

//        ddd($uuid);

        foreach ($ids as $index => $id) {
            if ( $ppns[$index] == 'null') {
                Ppc::where('id', $id)
                    ->update(['ppn' => null]);
            }elseif ( $ppns[$index] == '5') {
                Ppc::where('id', $id)
                    ->update(['ppn' => 5]);
            }elseif ( $ppns[$index] == '10') {
                Ppc::where('id', $id)
                    ->update(['ppn' => 10]);
            }else {
                Ppc::where('id', $id)
                    ->update(['ppn' => 15]);
            }
        }
        return redirect()->route('logUudp.UudpShow', $uuid);
    }



    public function unduhUUDP($uuid)
    {
        $uudp = DB::table('uudps')
            ->select('id', 'noUUDP', 'tglUUDP', 'kepada', 'lampiran', 'perihal', 'jenisBeli')
            ->where('uuid','=', $uuid)
            ->first();

        $ppmj = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcs.nomorPPMJ', 'ppcs.tanggalPPMJ', 'ppcs.pemesan', 'ppcs.jumlahHargaIsi', 'ppcs.ppn', 'ppcisis.namaMaterial')
            ->where('ppcs.idUUDP', '=', $uudp->id)
            ->groupBy('ppcs.nomorPPMJ')->get();

        $isi = DB::table('ppcs')
            ->select(DB::raw('SUM(jumlahHargaIsi) as total'))
            ->where('idUUDP', '=', $uudp->id)
            ->first();

        $pdf = PDF::loadView('logistik.logUudp.uudpPDF', compact('uudp', 'ppmj', 'isi'))->setPaper('a4');
        return $pdf->download($uudp->noUUDP.'.pdf');
    }
}
