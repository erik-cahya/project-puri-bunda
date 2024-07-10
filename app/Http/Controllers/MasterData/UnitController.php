<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\UnitModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel-admin.data-unit.index');
    }
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = UnitModel::all();
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
        return view('panel-admin.data-unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => 'required|unique:data_unit',
        ]);

        UnitModel::create([
            'nama_unit' => $request->nama_unit
        ]);

        return redirect('/unit');
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
        $data['dataUnit'] = UnitModel::where('id', $id)->first();
        return view('panel-admin.data-unit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = UnitModel::find($id);
        $item->nama_unit = $request->nama_unit;
        $item->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = UnitModel::find($id);
        $item->delete();

        return response()->json(['success' => true]);
    }
}
