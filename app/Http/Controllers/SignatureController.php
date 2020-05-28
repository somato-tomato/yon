<?php

namespace App\Http\Controllers;

use App\Signature;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
//    public function sigDex($id)
//    {
//        $sig = DB::table('users')
//            ->join('signature', 'users.id', '=', 'signatures.idUser')
//            ->select('users.name', 'users.role', 'signatures.path')
//            ->where('users.id', '=', $id)
//            ->first();
//
//        return view('users.sigDex', compact('sig'));
//    }
//
    public function signatureUser()
    {
        $id = Auth::user()->getAuthIdentifier();
        $sig = DB::table('signatures')
            ->select('path')
            ->where('idUser', '=', $id)
            ->first();
        return view('users.signature', compact('sig'));
    }

    public function upload(Request $request)
    {
        $user = Auth::user()->getAuthIdentifier();
        $folderPath = public_path('signature/');

        $image_parts = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . $user . '.'.$image_type;
        file_put_contents($file, $image_base64);
        $db = $user . '.' . $image_type;

        DB::table('signatures')
            ->updateOrInsert(
                ['idUser' => $user],
                ['path' => $db]
            );

        return back()->with('success', 'success Full upload signature');
    }
}
