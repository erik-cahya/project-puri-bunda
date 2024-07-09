<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\KaryawanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){

        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:karyawan',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $karyawan = KaryawanModel::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'unit_jabatan' => 'test jabatan',
            'tanggal_bergabung' => Carbon::now()->format('Y-m-d')
        ]);

        Auth::login($karyawan);
        return redirect()->intended('dashboard');
    }
}
