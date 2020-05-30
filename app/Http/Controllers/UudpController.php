<?php

namespace App\Http\Controllers;

use App\Ppc;
use App\Uudp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Psr7\str;

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

    public function loadPPMJ(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("ppcs")
                ->select("id","nomorPPMJ")
                ->where([['nomorPPMJ','LIKE',"%$search%"],['idUUDP', '=', null]])
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
}
