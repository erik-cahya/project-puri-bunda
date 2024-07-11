@extends('panel-admin.partials.master')
@section('styling_page')
    <style>
        .input-group.input-daterange {
            display: flex;
            align-items: center;
        }

        .input-group-addon {
            margin: 0 10px;
            font-weight: bold;
        }

        .form-control {
            max-width: 200px;
        }

        .datepicker {
            z-index: 1600 !important; /* make sure datepicker is above other elements */
        }
    </style>
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        
        <div class="mb-3">
            <form method="GET" action="{{ route('filter') }}">
                <div class="input-group input-daterange">
                    <input type="text" id="start_date" class="form-control" name="start_date" value="{{ $startDate }}" required>
                    <div class="input-group-addon">to</div>
                    <input type="text" id="end_date" class="form-control" name="end_date" value="{{ $endDate }}" required>
                    <div class="input-group-addon">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countKaryawan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Unit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countUnit }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Jabatan</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $countJabatan }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Total Login</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countLogin }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sign-in-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Username</th>
                                <th scope="col">Jumlah Login</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataUser as $user )
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->login_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Top 10 User</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Jumlah Login</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataTopUser as $user )  
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->login_logs_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    

</div>
<!-- /.container-fluid -->
@endsection
@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

     <script src="{{ asset('asset') }}/vendor/datatables/jquery.dataTables.min.js"></script>
     <script src="{{ asset('asset') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
 
     <script src="{{ asset('asset') }}/js/demo/datatables-demo.js"></script>

     <script>
        $(document).ready(function() {
            $('.input-daterange input').each(function() {
                $(this).datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight: true
                });
            });
        });
    </script>
@endsection