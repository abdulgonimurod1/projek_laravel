<!--================Header Menu Area =================-->
<header class="header_area mb-3" style="box-shadow: 0px 2px 6px #888">
    <div class="top_menu">
      
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              @foreach ($contact as $kontak)
              <p>email : {{$kontak->email}}</p>
              <p>wa : {{$kontak->wa}}</p>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{url('/')}}">
            <img src="{{url('asset/img/header.png')}}" alt="" style="width: 130px; height: 50px;"/>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/shop_page')}}">Belanja</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/tentang_kami')}}">Tentang Kami</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/cara_pesan')}}">Cara Pemesanan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/hubungi_kami')}}">Hubungi Kami</a>
                  </li> 
                </ul>
              </div>
                <div class="col-lg-5 pr-0">
                  <ul class="nav navbar-nav navbar-right right_nav pull-right">
                    {{-- <li class="nav-item search">
                      <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="icons">
                        <i class="ti-search" aria-hidden="true"></i>
                      </a>
                    </li> --}}
                    <form class="form-inline my-2 my-sm-3" action="{{ route('search') }}" method="GET">
                      <input class="form-control mr-sm-2" type="search" placeholder="Cari" name="query" value="{{ old('cari') }}" aria-label="Search">
                      <input class="btn btn-outline-warning my-2 my-sm-0" type="submit" value="Cari" style="border: 2px solid #000;color: #000;">
                    </form>
                    {{-- @guest
                      <li class="nav-item">
                        <a href="{{ route('cart_view') }}" style="text-decoration: none;" class="icons"> 
                          <i class="fa fa-shopping-cart"></i>
                        </a>
                        @else
                        @php
                        $pesanan_utama = \App\cart::where('user_id',Auth::user()->id)->where('status',0)->first();
                        if(!empty($pesanan_utama))
                        {
                          $notif = \App\cart_detail::where('cart_id',$pesanan_utama->id)->count();
                        }
                        @endphp
                        <a href="{{ route('cart_view') }}" style="color: #000; text-decoration: none;" class="icons">
                          <i class="fa fa-shopping-cart"></i>
                          @if(!@empty($notif))
                            <span class="badge badge-danger">{{$notif}}</span>
                          @endif
                        </a>  
                      </li>
                      @endguest
                    <li class="nav-item">
                      <div class="dropdown">
                        <a class="icons dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="ti-user"></i>
                        </a>
                        @guest
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{route('login')}}">Login</a>
                          @if (Route::has('registrasi'))
                            <a class="dropdown-item" href="{{route('registrasi')}}">Register</a>
                          @endif
                        </div>
                        @else
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">{{Auth::user()->name}}</a>
                          <a class="dropdown-item" href="{{route('order_view')}}">Lihat Status Pesanan Saya</a>
                          <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                        @endguest --}}
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <div class="collapse" id="collapseExample">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Cari" aria-label="Username" aria-describedby="basic-addon1">
      </div>
  </div>
  <!-- <li class="nav-item">
                    <a href="#" class="icons">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li> -->
                            
  <!--================Header Menu Area =================-->