<?php

namespace App\Http\Controllers;

use App\Vendor;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Terbilang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class VendorController extends Controller
{
    public function index()
    {
        return view('logistik.logStaff.vendor.vendorDex');
    }

    public function dataVendor()
    {
        return Datatables::of(Vendor::query())
            ->editColumn('status', function ($data) {
                $d = Carbon::now()->toDateString();
                if ($data->akhirKontrak >= $d){
                    return '<button class="btn btn-sm btn-success">ON</button>';
                } else {
                    return '<button class="btn btn-sm btn-danger">OFF</button>';
                }
            })
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-xs btn-success' href='/logistik/staff/$data->id/vendor'>View</a>";
            })
            ->escapeColumns([])->make(true);
    }

    public function vendorCreate()
    {
        return view('logistik.logStaff.vendor.vendorCre');
    }

    public function vendorSave(Request $request)
    {
        $request->validate([
            'namaVendor' => 'required|unique:vendors',
            'alamatVendor' => 'required',
            'telepon' => 'required',
            'awalKontrak' => 'required',
            'akhirKontrak' => 'required'
        ]);

        $form_data = array(
            'idUser' => Auth::user()->getAuthIdentifier(),
            'namaVendor' => $request->namaVendor,
            'alamatVendor' => $request->alamatVendor,
            'alamatVendor2' => $request->alamatVendor2,
            'telepon' => $request->telepon,
            'awalKontrak' => $request->awalKontrak,
            'akhirKontrak' => $request->akhirKontrak
        );

        Vendor::create($form_data);

        return redirect()->route('logstaff.vendorDex')->with('message', 'Vendor berhasil ditambahkan');
    }

    public function vendorShow($id)
    {
        $data = Vendor::findOrFail($id);
        $user = DB::table('vendors')
            ->join('users', 'vendors.idUser', '=', 'users.id')
            ->select('users.name')
            ->where('vendors.id', '=', $id)
            ->first();

        return view('logistik.logStaff.vendor.vendorShow', compact('data', 'user'));
    }
}
