@extends('halaman_utama.index')
@section('title', 'Shakeela Mart - Detail Produk')
@section('content')
<div class="body" style="background-color: #fff">
  <div class="container">
    <section id="aa-product-details">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-product-details-area">
              <!--================Single Product Area =================-->
              
              <div class="product_image_area">
                <div class="container">
                  <div class="row s_product_inner">
                    <div class="col-lg-6">
                      <div class="s_product_img">
                        <div
                          id="carouselExampleIndicators"
                          class="carousel slide"
                          data-ride="carousel"
                        >
                          <ol class="carousel-indicators" style="float:right; margin-bottom:10px">
                            <li
                              data-target="#carouselExampleIndicators"
                              data-slide-to="0"
                              class="active"
                            >
                              <img
                                src="{{ URL::to('/public/images/produk/' . $product->gambar1) }}"
                                alt=""
                                style="width: 60px; height:60px"
                              />
                            </li>
                            @if(!@empty($product->gambar2))
                            <li
                              data-target="#carouselExampleIndicators"
                              data-slide-to="1"
                            >
                              <img
                                src="{{ URL::to('/public/images/produk/' . $product->gambar2) }}"
                                alt=""
                                style="width: 60px; height:60px"
                              />
                            </li>
                            @else
                            @endif
                            @if(!@empty($product->gambar3))
                            <li
                              data-target="#carouselExampleIndicators"
                              data-slide-to="2"
                            >
                              <img
                                src="{{ URL::to('/public/images/produk/' . $product->gambar3) }}"
                                alt=""
                                style="width: 60px; height:60px"
                              />
                            </li>
                            @else
                            @endif
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img
                                class="d-block w-100"
                                src="{{ URL::to('/public/images/produk/' . $product->gambar1) }}"
                                alt="First slide"
                              />
                            </div>
                            @if(!@empty($product->gambar2))
                            <div class="carousel-item">
                              <img
                                class="d-block w-100"
                                src="{{ URL::to('/public/images/produk/' . $product->gambar2) }}"
                                alt="Second slide"
                              />
                            </div>
                            @else
                            @endif
                            @if(!@empty($product->gambar3))
                            <div class="carousel-item">
                              <img
                                class="d-block w-100"
                                src="{{ URL::to('/public/images/produk/' . $product->gambar3) }}"
                                alt="Third slide"
                              />
                            </div>
                            @else
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                      <div class="s_product_text">
                      <h3>{{$product->nama_produk}}</h3>
                        @if($product->jenis_produk == "promo")
                            <h2>Rp. {{ number_format($product->harga_diskon)}}</h2>
                            <del>Rp. {{ number_format($product->harga) }}</del>
                        @else
                            <h2>Rp. {{ number_format($product->harga)}}</h2>
                        @endif    
                        <ul class="list">
                          <li>
                            <a class="active" href="/search_kategori/{{ $kategori->id_kategori }}">
                            <span>Category</span> : {{$kategori->nama_kategori}}</a
                            >
                          </li>
                          <li>
                            <a class="active" href="#">
                           <span>Stok</span> : {{$product->stok}}
                           </a>
                          </li>
                        </ul>
                        <p>
                            <span>Link Marketplace</span>
                            <br>
                            <!-- instagram -->
                            @if(!@empty($product->instagram))
                                <a href="{{$product->instagram}}" target="_blank">
                                    <img src="{{ URL::to('/public/images/cara_pemesanan/instagram.png') }}" style="width: auto; height:37px;"/>
                                </a>
                            @else
                                @php
                                  $link = \App\Sosmed::where('nama_sosmed','like', "%instagram%")->where('tampilkan', 'ya')->first();
                                @endphp
                                @if(!@empty($link->link))
                                    <a href="{{$link->link}}" target="_blank">
                                        <img src="{{ URL::to('/public/images/cara_pemesanan/instagram.png') }}" style="width: auto; height:37px;"/>
                                    </a>
                                @else
                                @endif
                            @endif
                            
                            <!-- facebook -->
                            @if(!@empty($product->link_facebook))
                                <a href="{{$product->link_facebook}}" target="_blank">
                                    <img src="{{ URL::to('/public/images/cara_pemesanan/facebook.png') }}" style="width: auto; height:37px;"/>
                                </a>
                            @else
                                @php
                                  $link = \App\Sosmed::where('nama_sosmed','like', "%facebook%")->where('tampilkan', 'ya')->first();
                                @endphp
                                @if(!@empty($link->link))
                                    <a href="{{$link->link}}" target="_blank">
                                        <img src="{{ URL::to('/public/images/cara_pemesanan/facebook.png') }}" style="width: auto; height:37px;"/>
                                    </a>
                                @else
                                @endif
                            @endif
                            
                            <!-- lazada -->
                            @if(!@empty($product->link_lazada))
                                <a href="{{$product->link_lazada}}" target="_blank">
                                    <img src="{{ URL::to('/public/images/cara_pemesanan/lazada.png') }}" style="width: auto; height:37px;"/>
                                </a>
                            @else
                                @php
                                  $link = \App\Sosmed::where('nama_sosmed','like', "%lazada%")->where('tampilkan', 'ya')->first();
                                @endphp
                                @if(!@empty($link->link))
                                    <a href="{{$link->link}}" target="_blank">
                                        <img src="{{ URL::to('/public/images/cara_pemesanan/lazada.png') }}" style="width: auto; height:37px;"/>
                                    </a>
                                @else
                                @endif
                            @endif
                            
                            <!-- shopee -->
                            @if(!@empty($product->link_shopee))
                                <a href="{{$product->link_shopee}}" target="_blank">
                                    <img src="{{ URL::to('/public/images/cara_pemesanan/shopee.png') }}" style="width: 100px; height:auto;padding-left:10px;"/>
                                </a>
                            @else
                                @php
                                  $link = \App\Sosmed::where('nama_sosmed','like', "%shopee%")->where('tampilkan', 'ya')->first();
                                @endphp
                                @if(!@empty($link->link))
                                    <a href="{{$link->link}}" target="_blank">
                                        <img src="{{ URL::to('/public/images/cara_pemesanan/shopee.png') }}" style="width: 100px; height:auto;"/>
                                    </a>
                                @else
                                @endif
                            @endif
                            
                            <!-- tokopedia -->
                            @if(!@empty($product->link_tokopedia))
                                <a href="{{$product->link_tokopedia}}" target="_blank">
                                    <img src="{{ URL::to('/public/images/cara_pemesanan/tokopedia.png') }}" style="width: 100px; height:auto;padding-left:10px;"/>
                                </a>
                            @else
                                @php
                                  $link = \App\Sosmed::where('nama_sosmed','like', "%tokopedia%")->where('tampilkan', 'ya')->first();
                                @endphp
                                @if(!@empty($link->link))
                                    <a href="{{$link->link}}" target="_blank">
                                        <img src="{{ URL::to('/public/images/cara_pemesanan/tokopedia.png') }}" style="width: 100px; height:auto;"/>
                                    </a>
                                @else
                                @endif
                            @endif
                        </p>
                        <p>
                          {{$product->deskripsi}}
                        </p>
                        
                        <div class="card_area">
                        <!--<form method="POST" action="{{ url('addtocart') }}/{{ $product->id_produk }}">-->
                        <!--  @csrf-->
                        <!--  <div class="product_count">-->
                        <!--    <label for="qty">Quantity:</label>-->
                        <!--    <input-->
                        <!--      type="text"-->
                        <!--      name="qty"-->
                        <!--      id="sst"-->
                        <!--      maxlength="12"-->
                        <!--      value="1"-->
                        <!--      title="Quantity:"-->
                        <!--      class="input-text qty"-->
                        <!--    />-->
                        <!--    <button-->
                        <!--      onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"-->
                        <!--      class="increase items-count"-->
                        <!--      type="button"-->
                        <!--    >-->
                        <!--      <i class="lnr lnr-chevron-up"></i>-->
                        <!--    </button>-->
                        <!--    <button-->
                        <!--      onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"-->
                        <!--      class="reduced items-count"-->
                        <!--      type="button"-->
                        <!--    >-->
                        <!--      <i class="lnr lnr-chevron-down"></i>-->
                        <!--    </button>-->
                        <!--  </div>-->
                        <!--    <br><button type="submit" class="main_btn">Tambah Ke Keranjang</button>-->
                        <!--</form>-->
                        <!--<a class="main_btn" data-toggle="modal" data-target="#buatpenawaran" href="">Buat Penawaran</a>-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="buatpenawaran" tabindex="-1" role="dialog" aria-labelledby="buatpenawaran" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ url('buat_penawaran') }}">
        <div class="modal-body">
            <div class="row">
                <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="{{$product->id_produk}}">
                
                <div class="col-lg-12 col-md-12 col-sm-6" style="padding-top:10px;">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-top:10px;">
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Email">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-top:10px;">
                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Telpon / WhatsApp"  onkeypress="validate(event)">
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-6" style="padding-top:10px;">
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="4" placeholder="Alamat"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan Penawaran</button>
          <button type="submit" class="btn btn-success">Buat Penawaran</button>
        </div>
        </form>
    </div>
  </div>
</div>
@endsection