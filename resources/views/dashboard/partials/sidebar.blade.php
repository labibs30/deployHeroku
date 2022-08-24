<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">AVENYS Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{Request::is('dashboard/products') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/products">
            <i class="bi bi-box-seam-fill"></i>
            <span>Produk</span></a>
    </li>
    <li class="nav-item {{Request::is('dashboard/histories') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/histories">
            <i class="bi bi-cart4"></i>
            <span>Riwayat Pembelian</span></a>
    </li>
    <li class="nav-item {{Request::is('dashboard/categories') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/categories">
            <i class="bi bi-list-ul"></i>
            <span>Kategori</span></a>
    </li>
    <li class="nav-item {{Request::is('dashboard/crud*') | Request::is('dashboard/create') | Request::is('dashboard/detail/*') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/crud">
            <i class="bi bi-plus-circle-fill"></i>
            <span>Create / Action</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->

    <!-- Divider -->

    <!-- Sidebar Toggler (Sidebar) -->

    <!-- Sidebar Message -->

</ul>