@extends('halaman_utama.index')
@section('title', 'Shakeela Mart')
@section('content')
<!--================Home Banner Area =================-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    @foreach ($sliders as $slider)
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{Storage::url($slider->gambar)}}" alt="{{$slider->id}} slide">
    </div>
    @endforeach
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

  <!--================Home added Banner Area =================-->
{{-- <div id="bawahbanner" class="" style="margin-top: 10px">
  <img class="d-block w-100" src="{{url('asset/img/banner/bawah_banner.png')}}" alt="First slide">
</div> --}}
  <!--================End Home added Banner Area =================-->

  <!--================Home Collection Area =================-->
  <div id="cntn" class="cntn" style="margin:20px 30px 0 30px">
    <div id="produk_carousel" class="produk_carousel">
      <div class="carousel_title" style="padding: 10px">
          <center><h3>Produk Top SHAKEELA'S</h3></center>
      </div>
      <div class="carousel">
        <div id="carousel_1" class="owl-carousel">
          @foreach($product as $li)
            <div>
              <a href="/detail/{{ $li->id }}">
                <div class="image_prod" style="padding: 10px">
                {{-- <img src="{{url('asset/img/product/feature-product/{{ $li->gambar }}')}}" alt=""> --}}
                <img src="{{ asset('public/storage/'.$li->gambar1) }}" alt="{{ $li->gambar1 }}" />
              </div>
              <div class="image_name" style="text-transform: capitalize;padding: 0 10px">
                <h6>{{ $li->nama_produk }}</h6>
              </div>
              <div class="harga" style="font-size:8pt; margin-top:-5px2;padding: 0 10px">
                <b style="color: #000">Rp. {{ number_format($li->harga) }}</b>
                <span style="text-decoration: line-through; color:#a5a7ae">Rp. {{ number_format($li->harga) }}</span>
              </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection