@extends('panel-admin.partials.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Karyawan</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Karyawan</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="/karyawan">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="masukkan nama karyawan..." value="{{ old('nama_karyawan') }}">
                            @error('nama_karyawan')
                                <span style="color: red; font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username karyawan..." value="{{ old('username') }}">
                            @error('username')
                                <span style="color: red; font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password karyawan...">
                            @error('password')
                                <span style="color: red; font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="select_jabatan" class="form-label">Jabatan</label>
                            <select class="jabatan-select form-control" name="jabatan[]" multiple="multiple" id="select_jabatan">
                                <option disabled>select jabatan...</option>
                                @foreach ($dataJabatan as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>  
                                @endforeach
                            </select>

                            @error('jabatan')
                                <span style="color: red; font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="select_unit" class="form-label">Unit</label>
                            <select class="unit-select form-control" name="unit" id="select_unit">
                                <option selected disabled>select unit...</option>
                                @foreach ($dataUnit as $unit)
                                    @if (old('unit') == $unit->nama_unit)
                                        <option value="{{ $unit->id }}" selected>{{ $unit->nama_unit }}</option>  
                                    @else
                                        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>  
                                    @endif
                                @endforeach
                            </select>
                            @error('unit')
                                <span style="color: red; font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                            <input type="text" class="form-control datepicker" name="tanggal_bergabung" placeholder="pilih tanggal..." value="{{ old('tanggal_bergabung') }}">
                            @error('tanggal_bergabung')
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

@section('script')
<script>
    $(document).ready(function() {

        $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
        });
       
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

        $('.jabatan-select').select2({
            placeholder: 'select jabatan...',
            maximumSelectionLength: 2,
            language: {
                maximumSelected: function (args) {
                    var message = 'Anda hanya dapat memilih ' + args.maximum + ' Jabatan';
                    return message;
                }
            },
            tags: true,
            createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true
                    }
                }
        });
        $('.unit-select').select2({
                tags: true,
                placeholder: 'Select or add a unit',
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true
                    }
                }
            });

    });
</script>
@endsection