<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\JabatanModel;
use App\Models\KaryawanModel;
use App\Models\UnitModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel-admin.karyawan.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('karyawan')
                ->leftJoin('users', 'karyawan.id', '=', 'users.id_karyawan')
                ->leftJoin('data_jabatan as jabatan1', 'karyawan.id_jabatan_1', '=', 'jabatan1.id')
                ->leftJoin('data_jabatan as jabatan2', 'karyawan.id_jabatan_2', '=', 'jabatan2.id')
                ->leftJoin('data_unit', 'karyawan.id_unit', '=', 'data_unit.id')
                ->select(
                    'karyawan.*',
                    'users.username',
                    'jabatan1.nama_jabatan as nama_jabatan_1',
                    'jabatan2.nama_jabatan as nama_jabatan_2',
                    'data_unit.nama_unit'
                )
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dataJabatan'] = JabatanModel::get();
        $data['dataUnit'] = UnitModel::get();
        return view('panel-admin.karyawan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users',
            'password' => 'required',
            'jabatan' => 'required',
            'unit' => 'required',
            'tanggal_bergabung' => 'required',
        ]);

        // cek apakah data jabatan/unit ada di db
        $jabatan_1 = $request->jabatan[0];
        $jabatan1 = JabatanModel::where('id', $request->jabatan[0])->exists();
        if (!$jabatan1) {
            $jabatan_1_Id = JabatanModel::create([
                'nama_jabatan' => $request->jabatan[1]
            ]);
            $jabatan_1 = $jabatan_1_Id->id;
        }

        $jabatan_2 = $request->jabatan[1];
        if (isset($request->jabatan[1])) {
            $jabatan2 = JabatanModel::where('id', $request->jabatan[1])->exists();
            if (!$jabatan2) {
                $jabatan_2_Id = JabatanModel::create([
                    'nama_jabatan' => $request->jabatan[1]
                ]);
                $jabatan_2 = $jabatan_2_Id->id;
            }
        }

        $unit = $request->unit;
        $data_unit = UnitModel::where('id', $request->unit)->exists();
        if (!$data_unit) {
            $unit_Id = UnitModel::create([
                'nama_unit' => $request->unit
            ]);
            $unit = $unit_Id->id;
        }

        $idKaryawan = KaryawanModel::create([
            'nama_karyawan' => $request->nama_karyawan,
            'id_jabatan_1' => $jabatan_1,
            'id_jabatan_2' => $jabatan_2 ?? null,
            'id_unit' => $unit,
            'tanggal_bergabung' => Carbon::createFromFormat('d-m-Y', $request->tanggal_bergabung)->format('Y-m-d'),
        ]);

        User::create([
            'id_karyawan' => $idKaryawan->id,
            'name' => $request->nama_karyawan,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataJabatan'] = JabatanModel::get();
        $data['dataUnit'] = UnitModel::get();
        $data['dataKaryawan'] = DB::table('karyawan')->where('karyawan.id', $id)
            ->leftJoin('users', 'karyawan.id', '=', 'users.id_karyawan')
            ->select('karyawan.*', 'users.username')
            ->first();

        return view('panel-admin.karyawan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $item = KaryawanModel::find($id);
        $item->nama_karyawan = $request->nama_karyawan;
        $item->id_jabatan_1 = $request->jabatan[0];
        $item->id_jabatan_2 = $request->jabatan[1] ?? null;
        $item->tanggal_bergabung = Carbon::createFromFormat('d-m-Y', $request->tanggal_bergabung)->format('Y-m-d');

        $item->save();

        User::updateOrCreate([
            'id_karyawan' => $id,
        ], [
            'id_karyawan' => $id,
            'name' => $request->nama_karyawan,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = KaryawanModel::find($id);
        $item->delete();

        // Hapus juga data users
        $dataUsers = User::where('id_karyawan', $id)->exists();
        if ($dataUsers) {
            $user = User::where('id_karyawan', $id)->first();
            $user->delete();
        }

        return response()->json(['success' => true]);
    }
}
