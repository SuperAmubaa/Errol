<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/')}}">
       
        <div class="sidebar-brand-text mx-3">Errol Outdoor</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(Auth::user()->role->name == 'Petugas')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/kategori')}}">Kategori</a>
                <a class="collapse-item" href="{{ url('/barang')}}">Barang</a>
                <a class="collapse-item" href="{{ url('/denda')}}">Denda</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Penyewaan</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/peminjaman')}}">Peminjaman</a>
                <a class="collapse-item" href="{{ url('/pengembalian')}}">Pengembalian</a>
            </div>
        </div>
    </li>
    @endif

    @if(Auth::user()->role->name == 'Admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/user')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span></a>
    </li>
    @endif

    @if(Auth::user()->role->name == 'Anggota')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Penyewaan</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/penyewaan')}}">Sewa Barang</a>
                <a class="collapse-item" href="{{ url('/penyewaan-riwayat')}}">Riwayat Penyewaan</a>
            </div>
        </div>
    </li>
    @endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>