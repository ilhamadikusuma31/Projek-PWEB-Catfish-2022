
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= PATH_DASHBOARD; ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="<?= PATH_IMG; ?>/catfish.jpg" alt="" width="50px" class="rounded-5">
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= PATH_DASHBOARD; ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="<?= PATH_LOGIN; ?>">Login</a>
                    <a class="collapse-item" href="<?= PATH_REGISTRASI; ?>">Register</a>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="<?= PATH_CUSTOMER; ?>">Customer Page</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                aria-expanded="true" aria-controls="collapseTable">
                <i class="fas fa-fw fa-table"></i>
                <span>Table</span>
            </a>
            <div id="collapseTable" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Autentikasi:</h6>
                    <a class="collapse-item" href="<?= PATH_REGISTRASI; ?>">Register</a>
                    <a class="collapse-item" href="<?= PATH_REGISTRASI; ?>">Login</a>
                    <h6 class="collapse-header">Internal:</h6>
                    <a class="collapse-item" href="<?= PATH_KARYAWAN; ?>">Karyawan</a>
                    <a class="collapse-item" href="<?= PATH_AKTIVITAS; ?>">Aktivitas</a>
                    <a class="collapse-item" href="<?= PATH_KOLAM; ?>">Kolam</a>
                    <a class="collapse-item" href="<?= PATH_LELE; ?>">Lele</a>
                    <h6 class="collapse-header">Eksternal:</h6>
                    <a class="collapse-item" href="<?= PATH_CUSTOMER; ?>">Customer Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li> -->

        <!-- Nav Item - Tables -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->
