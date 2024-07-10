<?php

namespace App\Http\Controllers;

use App\Models\JabatanModel;
use App\Models\KaryawanModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['countKaryawan'] = KaryawanModel::count();
        $data['countUnit'] = UnitModel::count();
        $data['countJabatan'] = JabatanModel::count();
        return view('panel-admin.dashboard.index', $data);
    }
}
