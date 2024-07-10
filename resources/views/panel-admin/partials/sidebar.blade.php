 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->segment(1) === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Master Data</div>



    <!-- Nav Item - Data Karyawan-->
    <li class="nav-item {{ request()->segment(1) === 'karyawan' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#karyawanCollapsed"
            aria-expanded="true" aria-controls="karyawanCollapsed">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Karyawan</span>
        </a>
        <div id="karyawanCollapsed" class="collapse {{ request()->segment(1) === 'karyawan' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->segment(1) === 'karyawan' && request()->segment(2) === null ? 'active' : '' }}" href="/karyawan">Data Karyawan</a>
                <a class="collapse-item {{ request()->segment(1) === 'karyawan' && request()->segment(2) === 'create' ? 'active' : '' }}" href="/karyawan/create">Tambah Data</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Data Jabatan-->
    <li class="nav-item {{ request()->segment(1) === 'jabatan' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jabatanCollapse"
            aria-expanded="true" aria-controls="jabatanCollapse">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Jabatan</span>
        </a>
        <div id="jabatanCollapse" class="collapse {{ request()->segment(1) === 'jabatan' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->segment(1) === 'jabatan' && request()->segment(2) === null ? 'active' : '' }}" href="/jabatan">Data Jabatan</a>
                <a class="collapse-item {{ request()->segment(1) === 'jabatan' && request()->segment(2) === 'create' ? 'active' : '' }}" href="/jabatan/create">Tambah Data</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Data Unit-->
    <li class="nav-item {{ request()->segment(1) === 'unit' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#unitCollapse"
            aria-expanded="true" aria-controls="unitCollapse">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Unit</span>
        </a>
        <div id="unitCollapse" class="collapse {{ request()->segment(1) === 'unit' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->segment(1) === 'unit' && request()->segment(2) === null ? 'active' : '' }}" href="/unit">Data Unit</a>
                <a class="collapse-item {{ request()->segment(1) === 'unit' && request()->segment(2) === 'create' ? 'active' : '' }}" href="/unit/create">Tambah Data Unit</a>
            </div>
        </div>
    </li>


    


    <hr class="sidebar-divider">

 

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->