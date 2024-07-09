@extends('panel-admin.partials.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Unit</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">

        <div class="col-lg-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Unit</h6>
                </div>
                <div class="card-body">
                    
                    <form id="form-unit-edit">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Unit</label>
                            <input type="text" class="form-control" name="nama_unit" placeholder="masukkan nama unit..." value="{{ $dataUnit->nama_unit }}">
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#form-unit-edit').submit(function(e) {
                e.preventDefault();

                var itemId = {{ $dataUnit->id }};
                var formData = $(this).serialize();

                axios.put('/unit/' + itemId, formData)
                    .then(function (response) {
                        alert('Item updated successfully!');
                        window.location.href = '/unit'; // Redirect to item list page
                    })
                    .catch(function (error) {
                        console.error('Error updating item: ' + error);
                    });
            });
        });
    </script>
@endsection