<?php

namespace App\Http\Controllers;

use App\Models\JabatanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ItemController extends Controller
{
    public function index()
    {
        return view('items.index');
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
}
