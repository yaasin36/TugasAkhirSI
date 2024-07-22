<!-- Page Wrapper -->
 
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #6777ef">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon">
                <i class="fa-brands fa-monero"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Marabunta Money</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>

        <!-- Nav Item - Pendapatan -->
        <li class="nav-item {{ request()->routeIs('daftarPemasukan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('daftarPemasukan') }}">
                <i class="fa-solid fa-money-bill-trend-up"></i>
                <span>Pendapatan</span>
            </a>
        </li>

        <!-- Nav Item - Pengeluaran -->
        <li class="nav-item {{ request()->routeIs('daftarPengeluaran') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('daftarPengeluaran') }}">
                <i class="fa-solid fa-money-bill-transfer"></i>
                <span>Pengeluaran</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Staff
        </div>

        <!-- Nav Item - Staff -->
        <li class="nav-item {{ request()->routeIs('daftarKaryawan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('daftarKaryawan') }}">
                <i class="fa-solid fa-user-group"></i>
                <span>Staff</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Tagihan
        </div>

        <!-- Nav Item - Kredit -->
        <li class="nav-item {{ request()->routeIs('daftarKredit') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('daftarKredit') }}">
                <i class="fa-solid fa-chart-area"></i>
                <span>Kredit</span>
            </a>
        </li>

        <!-- Nav Item - Tagihan Bulanan -->
        <li class="nav-item {{ request()->routeIs('daftarTagihan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('daftarTagihan') }}">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Tagihan Bulanan</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            LAPORAN
        </div>

        <!-- Nav Item - Laporan -->
        <li class="nav-item {{ request()->routeIs('downloadLaporan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('downloadLaporan') }}">
                <i class="fa-solid fa-file-alt"></i>
                <span>Laporan</span>
            </a>
        </li>

        <!-- Divider -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
