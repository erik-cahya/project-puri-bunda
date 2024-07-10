<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\JabatanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel-admin.jabatan.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = JabatanModel::all();
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
        return view('panel-admin.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        JabatanModel::create([
            'nama_jabatan' => $request->nama_jabatan
        ]);

        return redirect('/jabatan');
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
        $data['dataJabatan'] = JabatanModel::where('id', $id)->first();
        return view('panel-admin.jabatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = JabatanModel::find($id);
        $item->nama_jabatan = $request->nama_jabatan;
        $item->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = JabatanModel::find($id);
        $item->delete();

        return response()->json(['success' => true]);
    }
}
