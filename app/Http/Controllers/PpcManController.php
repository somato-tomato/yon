<?php

namespace App\Http\Controllers;

use App\Ppc;
use App\PpcAcc;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PpcManController extends Controller
{
    public function notyetApp()
    {
        return view('ppc.man.ppcAcc');
    }

    public function dataNyapp()
    {
        $nyapp = DB::table('ppcs')
            ->where('cekManager', '=', 0)
            ->get();

        return DataTables::of($nyapp)
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-xs btn-success' href='/ppc/$data->id/nyapp'>View</a>";
            })
            ->rawColumns(['lihat'])
            ->make(true);
    }

    public function hasbeenApp()
    {
        return view('ppc.man.pccHBAcc');
    }

    public function dataHbapp()
    {
        $hbapp = DB::table('ppcs')
            ->join('ppc_accs', 'ppcs.id', '=', 'ppc_accs.idPPC')
            ->select('ppcs.id','ppcs.tanggalPPMJ', 'ppcs.nomorPPMJ', 'ppcs.nomorPO', 'ppcs.pemesan', 'ppcs.namaOrder', 'ppc_accs.approved')
            ->where('ppcs.cekManager', '=', 1)
            ->get();

        return DataTables::of($hbapp)
            ->addColumn('unduh', function($data) {
                return '<a class="btn btn-xs btn-success" href="' . route('nyapp.unduh', $data->id) .'">Unduh</a>';
            })
            ->rawColumns(['unduh'])
            ->make(true);
    }

    public function hasbeenRej()
    {
        return view('ppc.man.pccHBRej');
    }

    public function dataHbrej()
    {
        $hbrej = DB::table('ppcs')
            ->join('ppc_accs', 'ppcs.id', '=', 'ppc_accs.idPPC')
            ->select('ppcs.tanggalPPMJ', 'ppcs.nomorPPMJ', 'ppcs.nomorPO', 'ppcs.pemesan', 'ppcs.namaOrder', 'ppc_accs.notApproved')
            ->where('ppcs.cekManager', '=', 2)
            ->get();

        return DataTables::of($hbrej)->make(true);
    }

    public function findNyapp($id)
    {
        $nyapp = Ppc::findOrFail($id);
        $add = DB::table('ppcs')
            ->join('ppcisis', 'ppcs.id', '=', 'ppcisis.idPPC')
            ->select('ppcisis.namaMaterial', 'ppcisis.satuan', 'ppcisis.jumlahMaterial', 'ppcisis.satuanHarga', 'ppcisis.jumlahHarga')
            ->where('ppcisis.idPPC', '=', $id)
            ->get();

        $jumlah = $add->sum('jumlahHarga');

        return view('ppc.man.ppcShow', compact('nyapp', 'add', 'jumlah'));
    }

    public function updateNyapp(Request $request, $id)
    {
        $request->validate([
            'idPPC' => 'unique:ppc_accs'
        ]);

        if ($request->get('save_action') == 'Approve'){
            $form_data = array(
                'keterangan' => $request->keterangan,
                'idPPC' => $id,
                'idUser' => Auth::user()->getAuthIdentifier(),
                'approved' => Carbon::now()
            );

            PpcAcc::create($form_data);
            Ppc::whereId($id)->update(['cekManager' => 1]);

            return redirect()->route('nyapp.dex')->with('message', 'Pengajuan Approved');
        } else {
            $form_data = array(
                'keterangan' => $request->keterangan,
                'idPPC' => $id,
                'idUser' => Auth::user()->getAuthIdentifier(),
                'notApproved' => Carbon::now()
            );

            PpcAcc::create($form_data);
            Ppc::whereId($id)->update(['cekManager' => 2]);

            return redirect()->route('nyapp.dex')->with('message', 'Pengajuan Not Approved');
        }

    }

    public function unduhPPMJ($id)
    {
        $ppmj = Ppc::findOrFail($id);
        $isi = DB::table('ppcisis')
            ->select('namaMaterial', 'satuan', 'jumlahMaterial', 'satuanHarga', 'jumlahHarga', 'keterangan')
            ->where('idPPC', '=', $id)
            ->get();
        $total = DB::table('ppcisis')
            ->select(DB::raw('SUM(jumlahHarga) as total'))
            ->where('idPPC', '=', $id)
            ->first();
        $nama = DB::table('users')
            ->join('ppc_accs', 'users.id', '=', 'ppc_accs.idUser')
            ->join('signatures', 'users.id', '=', 'signatures.idUser')
            ->select('users.name', 'signatures.path')
            ->where('ppc_accs.idPPC', '=' , $id)
            ->first();
        $time = Carbon::now()->toTimeString();

        $pdf = PDF::loadView('ppc.pdfPPMJ', compact('ppmj', 'isi',  'nama', 'total'))->setPaper('a4')->setOrientation('landscape');
        return $pdf->download($ppmj->nomorPPMJ.'_'.$time.'.pdf');
    }

}
