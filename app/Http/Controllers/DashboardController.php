<?php

namespace App\Http\Controllers;

use App\Models\JabatanModel;
use App\Models\KaryawanModel;
use App\Models\LoginLogModel;
use App\Models\UnitModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(KaryawanModel::whereBetween('created_at', ['2024-07-10 00:00:00', '2024-07-10 23:59:59'])->count());

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

    public function filter(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $startDate = Carbon::createFromFormat('d-m-Y', $request->input('start_date'))->format('Y-m-d') . ' 00:00:00';
        $endDate = Carbon::createFromFormat('d-m-Y', $request->input('end_date'))->format('Y-m-d') . ' 23:59:59';


        $data['countKaryawan'] = KaryawanModel::whereBetween('created_at', [$startDate, $endDate])->count();
        $data['countUnit'] = UnitModel::whereBetween('created_at', [$startDate, $endDate])->count();
        $data['countJabatan'] = JabatanModel::whereBetween('created_at', [$startDate, $endDate])->count();
        $data['countLogin'] = LoginLogModel::whereBetween('created_at', [$startDate, $endDate])->count();

        // Ambil semua data user
        $users = User::whereBetween('created_at', [$startDate, $endDate])->get();
        // Tambahkan jumlah login ke setiap pengguna
        foreach ($users as $user) {
            $user->login_count = LoginLogModel::where('user_id', $user->id)->whereBetween('created_at', [$startDate, $endDate])->count();
        }
        $data['dataUser'] = $users;

        // Ambil 10 pengguna teratas dengan jumlah login lebih dari 25 kali
        $topUsers = User::withCount('loginLogs')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->having('login_logs_count', '>', 25)
            ->orderBy('login_logs_count', 'desc')
            ->take(10)
            ->get();

        $data['dataTopUser'] = $topUsers;
        return view('panel-admin.dashboard.index', $data);
    }
}
