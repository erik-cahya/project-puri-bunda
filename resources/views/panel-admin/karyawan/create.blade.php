@extends('panel-admin.partials.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Karyawan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="/karyawan">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama_karyawan" placeholder="masukkan nama karyawan...">
                        </div>
                        <div class="mb-3">
                            
                            <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                    
                            <select class="jabatan-select form-control" name="jabatan[]" multiple="multiple">
                                <option disabled>select jabatan...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                              
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
    $('.jabatan-select').select2({
        placeholder: 'select jabatan...',
        maximumSelectionLength: 2,
            language: {
                maximumSelected: function (args) {
                    var message = 'Anda hanya dapat memilih ' + args.maximum + ' Jabatan';
                    return message;
                }
            }
    });
});
</script>

@endsection