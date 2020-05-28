<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pengguna = User::all();
        return view('users.index', compact('pengguna'));
    }

    public function formReg()
    {
        return view('users.formReg');
    }

    public function regUser(Request $request)
    {
        $request->validate([
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191|unique:users',
            'password'  =>  'required|string|min:1|confirmed',
            'role'      =>  'required'
        ]);

        $form_data = array(
            'name'      =>   $request->name,
            'email'     =>   $request->email,
            'password'  =>   Hash::make($request->password),
            'role'      =>   $request->role
        );

        User::create($form_data);
        return redirect()->route('user.index')->with('message', 'Akun Berhasil di Buat!');
    }
}
