<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center ml-1" href="/dashboard">
        <div class="sidebar-brand-icon">
          <img src="{{url('asset/img/Logo.png')}}" type="image/png" width="50px;" height="50px;">
        </div>
        <div class="sidebar-brand-text mx-1">Shakeela's Mart</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{request()->is('dashboard') ? ' active' : ''}}">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
          <i class="far fa-fw fa-folder-open"></i>
          <span>Master</span>
        </a>
        <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route ('produk.index')}}">Produk</a>
            <a class="collapse-item" href="{{route ('kategori.index')}}">Kategori</a>
          </div>
        </div>
      </li>
      

      <!-- Divider -->
      {{-- <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
          <i class="fas fa-fw fa-laptop"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route ('admin.cart')}}">Order</a>
            <a class="collapse-item" href="{{route ('admin.cart_detail')}}">Cart Detail</a>
          </div>
        </div>
      </li> --}}

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
          <i class="far fa-fw fa-edit"></i>
          <span>Pengaturan Website</span>
        </a>
        <div id="collapseSetting" class="collapse" aria-labelledby="headingSetting" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/">Halaman Website</a>
            <a class="collapse-item" href="{{route ('kontak.index')}}">Hubungi Kami</a>
            <a class="collapse-item" href="{{route ('about_us.index')}}">Tentang Kami</a>
            <a class="collapse-item" href="{{route ('cara_pemesanan.index')}}">Cara Pemesanan</a>
            <a class="collapse-item" href="{{route ('sosmed.index')}}">Sosial Media</a>
            <a class="collapse-item" href="{{route ('owner.index')}}">Owner</a>
            <a class="collapse-item" href="{{ route ('slider.index')}}">Slide</a>
            <a class="collapse-item" href="{{ route ('banner.index')}}">Banner Promo</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
          <i class="far fa-fw fa-edit"></i>
          <span>Administrator</span>
        </a>
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('user.index')}}">Data User</a>
            <a class="collapse-item" href="{{route('pengunjung')}}">Pengunjung</a>
          </div>
        </div>
      </li>
      
      <!-- Divider -->
    <hr class="sidebar-divider my-0">

      <!-- Cetak -->
      <li class="nav-item">
        <a class="nav-link" href="/report">
          <i class="fas fa-fw fa-print"></i>
          <span>Report</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>