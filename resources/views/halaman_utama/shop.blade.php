@extends('halaman_utama.index')
@section('title', 'Shakeela Mart')
@section('content')
<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="product_top_bar mb-1">
          <h4 class="my-1">Produk</h4>
        </div>
        
        <div class="latest_product_inner">
          <div class="row">
            <!--@foreach ($product as $item)-->
            <!--@if($item->jenis_produk == "produk baru")-->
            <!--<a href="/detail/{{ $item->id_produk }}">    -->
            <!--<div class="col-lg-4 col-md-6">-->
            <!--  <div class="single-product">-->
            <!--    <div class="product-img">-->
            <!--      <img-->
            <!--      class="card-img"-->
            <!--      src="{{ URL::to('/')}}/images/produk/{{$item->gambar1}}"-->
            <!--      alt=""-->
            <!--      />-->
            <!--    </div>-->
            <!--    <div class="product-btm">-->
            <!--      <a href="/detail/{{ $item->id_produk }}" class="d-block">-->
            <!--        <h4>{{$item->nama_produk}}</h4>-->
            <!--      </a>-->
            <!--      <div class="mt-3">-->
            <!--        <span class="mr-4">Rp. {{number_format($item->harga)}}</span>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!--</a>-->
            <!--@endif-->
            <!--@endforeach-->
            
            <!--@foreach ($product as $item)-->
            <!--@if($item->jenis_produk == "top produk")-->
            <!--<a href="/detail/{{ $item->id_produk }}">    -->
            <!--<div class="col-lg-4 col-md-6">-->
            <!--  <div class="single-product">-->
            <!--    <div class="product-img">-->
            <!--      <img-->
            <!--      class="card-img"-->
            <!--      src="{{ URL::to('/')}}/images/produk/{{$item->gambar1}}"-->
            <!--      alt=""-->
            <!--      />-->
            <!--    </div>-->
            <!--    <div class="product-btm">-->
            <!--      <a href="/detail/{{ $item->id_produk }}" class="d-block">-->
            <!--        <h4>{{$item->nama_produk}}</h4>-->
            <!--      </a>-->
            <!--      <div class="mt-3">-->
            <!--        <span class="mr-4">Rp. {{number_format($item->harga)}}</span>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!--</a>-->
            <!--@endif-->
            <!--@endforeach-->
            
            @foreach ($product as $item)
            <a href="/detail/{{ $item->id_produk }}">    
            <div class="col-lg-4 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img
                  class="card-img"
                  src="{{ URL::to('/')}}/public/images/produk/{{$item->gambar1}}"
                  alt=""
                  />
                </div>
                <div class="product-btm">
                  <a href="/detail/{{ $item->id_produk }}" class="d-block">
                    <h4>{{$item->nama_produk}}</h4>
                  </a>
                  @if($item->jenis_produk == "promo")
                  <div class="mt-3">
                    <span class="mr-4">Rp. {{number_format($item->harga_diskon)}}</span>
                    <del>Rp. {{ number_format($item->harga) }}</del>
                  </div>
                  @else
                    <div class="mt-3">
                        <span class="mr-4">Rp. {{number_format($item->harga)}}</span>
                    </div>
                  @endif
                </div>
              </div>
            </div>
            </a>
            
            @endforeach

          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="left_sidebar_area">
          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Cari Kategori</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                @foreach ($cg as $item)
                <li>
                  <a href="/search_kategori/{{ $item->id_kategori }}" style = "text-decoration:none">{{$item->nama_kategori}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </aside>
          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
                <h3>Rekomendasi Produk</h3>
            </div>
            @forelse($promo as $item)
              <a href="/detail/{{ $item->id_produk }}">
                  <div class="media post_item" style="padding-top:10px;">
                      <img src="{{ URL::to('/')}}/public/images/produk/{{$item->gambar1}}" style="width:70px; height: auto;padding-left:10px" alt="post">
                      <div class="media-body" style="padding-left:10px">
                            <span style="font-size:x-large;color:#4a4a4a;">{{$item->nama_produk}}</span>
                            <p style="color:#000;font-size:larger;font-weight:600;">Rp. {{number_format($item->harga_diskon)}}<span style="text-decoration: line-through; color:#797979;font-size:x-small;"> Rp. {{number_format($item->harga)}}</span></p>
                            
                      </div>
                  </div>
              </a>
            @empty
            @endforelse
          </aside>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Category Product Area =================-->
@endsection