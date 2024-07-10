<?php

namespace App\Http\Controllers;

use App\Models\JabatanModel;
use App\Models\KaryawanModel;
use App\Models\LoginLogModel;
use App\Models\UnitModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['countKaryawan'] = KaryawanModel::count();
        $data['countUnit'] = UnitModel::count();
        $data['countJabatan'] = JabatanModel::count();
        $data['countLogin'] = LoginLogModel::count();

        // Ambil semua data user
        $users = User::all();
        // Tambahkan jumlah login ke setiap pengguna
        foreach ($users as $user) {
            $user->login_count = LoginLogModel::where('user_id', $user->id)->count();
        }
        $data['dataUser'] = $users;

        // Ambil 10 pengguna teratas dengan jumlah login lebih dari 25 kali
        $topUsers = User::withCount('loginLogs')
            ->having('login_logs_count', '>', 25)
            ->orderBy('login_logs_count', 'desc')
            ->take(10)
            ->get();

        $data['dataTopUser'] = $topUsers;
        // dd($data['dataTopUser']);
        return view('panel-admin.dashboard.index', $data);
    }
}
