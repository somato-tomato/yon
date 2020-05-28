<?php

namespace App\Http\Controllers;

use App\Ppc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;

class PpcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ppc.ppcDex');
    }

    public function getIndex()
    {
        return DataTables::of(Ppc::query())
            ->editColumn('cekManager', function($data) {
                if($data->cekManager === 0){
                    return '<button class="btn btn-sm btn-warning">Belum Approve</button>';
                }elseif ($data->cekManager === 1){
                    return '<button class="btn btn-sm btn-success">Approve</button>';
                } else {
                    return '<button class="btn btn-sm btn-danger">Rejected</button>';
                }
            })
            ->editColumn('cekLogistik', function ($data) {
                if ($data->cekLogistik === 'PMT'){
                    return '<button class="btn btn-sm btn-primary">PMT</button>';
                }elseif ($data->cekLogistik === 'SPK'){
                    return '<button class="btn btn-sm btn-primary">SPK</button>';
                } elseif ($data->cekLogistik === 'SJAN') {
                    return '<button class="btn btn-sm btn-primary">SJAN</button>';
                } else {
                    return '<button class="btn btn-sm btn-warning">Belum Approve</button>';
                }
            })
            ->escapeColumns([])
            ->make(true);
    }

//    public function draftIndex()
//    {
//        return view('ppc.draftDex');
//    }
//
//    public function getDraft()
//    {
//        $draft = DB::table('ppcs')
//            ->where('cekManager', '=', 2)
//            ->get();
//
//        return DataTables::of($draft)
//            ->addColumn('lihat', function($data) {
//                return "<a class='btn btn-xs btn-success' href='/ppc/$data->id/nyapp'>View</a>";
//            })
//            ->rawColumns(['lihat'])
//            ->make(true);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ppc.ppcCre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomorPPMJ'   =>  'required|unique:ppcs',
            'tanggalPPMJ' =>  'required',
            'tanggalPO'   =>  'required',
            'tujuanSurat' =>  'required',
            'pemesan'     =>  'required',
            'namaOrder'   =>  'required',
            'nomorPO'     =>  'required',
            'jumlahOrder' =>  'required'
        ]);

        $form_data = array(
            'nomorPPMJ'   =>  $request->nomorPPMJ,
            'tanggalPPMJ' =>  $request->tanggalPPMJ,
            'dasarPP'     =>  $request->dasarPP,
            'tanggalPP'   =>  $request->tanggalPP,
            'tanggalPO'   =>  $request->tanggalPO,
            'tujuanSurat' =>  $request->tujuanSurat,
            'pemesan'     =>  $request->pemesan,
            'namaOrder'   =>  $request->namaOrder,
            'nomorPO'     =>  $request->nomorPO,
            'jumlahOrder' =>  $request->jumlahOrder,
        );
        Ppc::create($form_data);

        $id = DB::table('ppcs')
            ->select('id')
            ->where('nomorPPMJ', '=', $request->nomorPPMJ)
            ->first();

        return redirect(URL::signedRoute('ppcisi.create', $id->id, now()->addMinutes(60)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ppc::findOrFail($id);
        $add = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcisis.namaMaterial', 'ppcisis.satuan', 'ppcisis.jumlahMaterial', 'ppcisis.satuanHarga', 'ppcisis.jumlahHarga')
            ->where('ppcisis.idPPC', '=', $id)
            ->get();

        return view('ppc.ppcShow', compact('data', 'add'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $data = Ppc::findOrFail($id);
//        return view('ppc.draftUp');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
