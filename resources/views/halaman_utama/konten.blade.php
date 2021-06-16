@extends('halaman_utama.index')
@section('title', 'Shakeela Mart')
@section('content')
<!--================Home Banner Area =================-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
    @php
        $i = 0;
        $limit = \App\slider::where('tampilkan','ya')->count();
    @endphp
    @for ($no = 0; $no < $limit; $no++)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{$no}}"></li>
    @endfor
  </ol>
  <div class="carousel-inner">
    @foreach ($sliders as $slider)
    <!--@if ($slider->tampilkan == "ya")-->
        
    <!--@endif-->
    <div class="carousel-item @if($slider->id === 1){ active } @endif">
      <img class="d-block w-100" src="{{ URL::to('/public/images/slider/' .$slider->gambar) }}" style="height:625px;" alt="{{$slider->id}} slide">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!--================End Home Banner Area =================-->
  <div id="cntn" class="cntn" style="margin:20px 100px 0 100px">
    <div id="produk_carousel" class="produk_carousel">
      <div class="carousel_title" style="padding: 10px;text-align:center">
          <h3><B style="color: #000">TOP PRODUK</B></h3>
          <hr style="width: 20%">
      <span><a href="{{ url('/shop_page')}} " style="float:right;color:#71cd14">see all</a></span>
      </div>
      <div class="carousel" style="margin-top: 15px">
        <div id="carousel_1" class="owl-carousel">
          @forelse($top as $item)
            <div>
                <div class="single-product">
                    <div class="product-img">
                      <a href="/detail/{{ $item->id_produk }}">
                        <img
                          class="img-fluid w-100"
                          src="{{ URL::to('/public/images/produk/' . $item->gambar1) }}" alt="{{ $item->gambar1 }}">
                      </a>
                      <div class="p_icon">
                        <form method="POST" action="{{ url('addtocart') }}/{{ $item->id_produk }}" name="addcart{{$item->id_produk}}" id="addcart{{$item->id_produk}}">
                          @csrf
                            <input type="hidden" name="qty" value="1">
                            <a href="/detail/{{ $item->id_produk }}">
                              <i class="ti-eye"></i>
                            </a>
                            <!--<a href="javascript:{}" onclick="document.getElementById('addcart{{$item->id_produk}}').submit();">-->
                            <!--  <i class="ti-shopping-cart"></i>-->
                            <!--</a>-->
                        </form>
                      </div>
                    </div>
                    <a href="/detail/{{ $item->id_produk }}">
                      <div class="product-btm">
                          <h4>{{ $item->nama_produk }}</h4>
                        <div class="mt-3">
                          <span class="mr-4">Rp. {{ number_format($item->harga) }}</span>
                          <!--<del>Rp.200.000</del>-->
                        </div>
                      </div>
                    </a>
                </div>
            </div>
            @empty
                <center><h1>Data Kosong</h1></center>
            @endforelse
            <!--<div>-->
            <!--    <div class="single-product">-->
            <!--        <div class="product-img">-->
            <!--          <a href="{{ url('/shop_page')}}">-->
            <!--            <img-->
            <!--              class="img-fluid w-100"-->
            <!--              src="{{ URL::to('/public/images/produk/seemore.png') }}" alt="">-->
            <!--          </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
      </div>
    </div>
  </div>
    <!--================ Inspired Product Area =================-->
    
    <!--================Home added Banner Area =================-->
  <div id="bawahbanner" class="">
    @forelse($banpro as $item)
        <center>
            <a href="{{$item->link_promo}}" target="_blank">
                <img class="d-block" src="{{url('/public/images/banner/' . $item->gambar)}}" alt="First slide" style="width:100%; height:auto;">
            </a>
        </center>
    @empty
    @endforelse
  </div>
  <!--================End Home added Banner Area =================-->
  
  <!--================ New Product Area =================-->
  <section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>PRODUK PROMO</span></h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
        @forelse($promo1 as $item)
          <div class="new_product">
            <h5 class="text-uppercase">collection of 2020</h5>
            <h3 class="text-uppercase">{{ $item->nama_produk }}</h3>
            <div class="product-img">
              <img class="img-fluid" src="{{ URL::to('/public/images/produk/' . $item->gambar1) }}" alt="" />
            </div>
            <h4>Rp. {{ number_format($item->harga) }}</h4>
                <!--<form method="POST" action="{{ url('addtocart') }}/{{ $item->id_produk }}" name="addcart{{$item->id_produk}}" id="addcart{{$item->id_produk}}">-->
                <!--  @csrf-->
                <!--    <input type="hidden" name="qty" value="1">-->
                <!--    <a href="javascript:{}" onclick="document.getElementById('addcart{{$item->id_produk}}').submit();"  class="main_btn">Add to cart</a>-->
                <!--</form>-->
                
                <a class="main_btn" href="/detail/{{ $item->id_produk }}">
                  Lihat Produk
                </a>
          </div>
          @empty
          @endforelse
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
            @forelse($promo as $item)
            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="{{ URL::to('/public/images/produk/' . $item->gambar1) }}" alt="" />
                  <div class="p_icon">
                    <form method="POST" action="{{ url('addtocart') }}/{{ $item->id_produk }}" name="addcart{{$item->id_produk}}" id="addcart{{$item->id_produk}}">
                      @csrf
                        <input type="hidden" name="qty" value="1">
                        <a href="/detail/{{ $item->id_produk }}">
                          <i class="ti-eye"></i>
                        </a>
                        <!--<a href="javascript:{}" onclick="document.getElementById('addcart{{$item->id_produk}}').submit();">-->
                        <!--  <i class="ti-shopping-cart"></i>-->
                        <!--</a>-->
                    </form>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>{{ $item->nama_produk }}</h4>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">Rp. {{ number_format($item->harga_diskon) }}</span>
                    <del>Rp. {{ number_format($item->harga) }}</del>
                  </div>
                </div>
              </div>
            </div>
            @empty
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End New Product Area =================-->
    
<div id="cntn" class="cntn" style="margin:20px 100px 0 100px">
    <div id="produk_carousel" class="produk_carousel">
      <div class="carousel_title" style="padding: 10px;text-align:center">
          <h3><B style="color: #000">PRODUK BARU</B></h3>
          <hr style="width: 20%">
      <span><a href="{{ url('/shop_page')}} " style="float:right;color:#71cd14">see all</a></span>
      </div>
      <div class="carousel" style="margin-top: 15px">
        <div id="carousel_produk_baru" class="owl-carousel">
          @forelse($baru as $item)
            <div>
                <div class="single-product">
                    <div class="product-img">
                      <a href="/detail/{{ $item->id_produk }}">
                        <img
                          class="img-fluid w-100"
                          src="{{ URL::to('/public/images/produk/' . $item->gambar1) }}" alt="{{ $item->gambar1 }}">
                      </a>
                      <div class="p_icon">
                        <form method="POST" action="{{ url('addtocart') }}/{{ $item->id_produk }}" name="addcart{{$item->id_produk}}" id="addcart{{$item->id_produk}}">
                          @csrf
                            <input type="hidden" name="qty" value="1">
                            <a href="/detail/{{ $item->id_produk }}">
                              <i class="ti-eye"></i>
                            </a>
                            <!--<a href="javascript:{}" onclick="document.getElementById('addcart{{$item->id_produk}}').submit();">-->
                            <!--  <i class="ti-shopping-cart"></i>-->
                            <!--</a>-->
                        </form>
                      </div>
                    </div>
                    <a href="/detail/{{ $item->id_produk }}">
                      <div class="product-btm">
                          <h4>{{ $item->nama_produk }}</h4>
                        <div class="mt-3">
                          <span class="mr-4">Rp. {{ number_format($item->harga) }}</span>
                          <!--<del>Rp.200.000</del>-->
                        </div>
                      </div>
                    </a>
                </div>
            </div>
            @empty
            <center><h1>Data Kosong</h1></center>
          @endforelse
        </div>
      </div>
    </div>
  </div>
  
@endsection