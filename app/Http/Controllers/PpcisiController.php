<?php

namespace App\Http\Controllers;

use App\Ppcisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PpcisiController extends Controller
{
    public function create($id)
    {
        $id = DB::table('ppcs')
            ->select('id')
            ->where('id', '=', $id)
            ->first();

        return view('ppc.isiCre', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'addmore.*.idPPC' => 'required',
            'addmore.*.namaMaterial' => 'required',
            'addmore.*.satuan' => 'required',
            'addmore.*.jumlahMaterial' => 'required',
            'addmore.*.satuanHarga' => 'required',
            'addmore.*.jumlahHarga' => 'required'
        ]);

        foreach ($request->addmore as $key => $value) {
            Ppcisi::create($value);
        }

        return redirect()->route('ppc.index');
    }
}
