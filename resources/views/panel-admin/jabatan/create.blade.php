@extends('panel-admin.partials.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Jabatan</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="/jabatan">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Jabatan</label>
                            <input type="text" class="form-control" name="nama_jabatan" placeholder="masukkan nama jabatan...">
                            @error('nama_jabatan')
                                <span style="color: red; font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>


    </div>


</div>
@endsection