@extends('halaman_utama.index')
@section('title', 'Shakeela Mart')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
          <div class="container">
            <div
              class="banner_content d-md-flex justify-content-between align-items-center"
            >
              <div class="mb-3 mb-md-0">
                <h2>Product Details</h2>
                <p>Very us move be blessed multiply night</p>
              </div>
              <div class="page_link">
                <a href="/">Beranda </a>
                <a href="/produk/{{$product->id_produk}}">Product Details</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================End Home Banner Area =================-->
  
      <!--================Single Product Area =================-->
      @if (session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('danger')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>     
      @endif
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>     
      @endif
      <div class="product_image_area">
        <div class="container">
          <div class="row s_product_inner">
            <div class="col-lg-6">
              <div class="s_product_img">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                      <img src="{{ Storage::url($product->gambar1 )}}" alt="" width="60px" height="60px">
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1">
                      <img src="{{ Storage::url($product->gambar2 )}}" alt="" width="60px" height="60px">
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" >
                      <img src="{{ Storage::url($product->gambar3 )}}" alt="" width="60px" height="60px">
                    </li>
                  </ol>
                  
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{ Storage::url($product->gambar1 )}}" width="555px" height="600px" class="d-block w-100" alt="First slide">
                    </div>
                    <div class="carousel-item ">
                      <img src="{{ Storage::url($product->gambar2 )}}" width="555px" height="600px" class="d-block w-100" alt="Second slide">
                    </div>
                    <div class="carousel-item ">
                      <img src="{{ Storage::url($product->gambar3 )}}" width="555px" height="600px" class="d-block w-100" alt="Third slide">
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
              <div class="s_product_text">
                <h3>{{$product->nama_produk}}</h3>
                <h2>Rp.{{ number_format($product->harga) }}</h2>
                <ul class="list">
                  <li>
                    <a class="active" href="#" style="text-decoration: none">
                      <span>Kategori</span> : {{$product->category->nama_kategori}}</a
                    >
                  </li>
                  <li>
                    <a href="" style="text-decoration: none">
                      <span>Stok</span> : {{$product->stok}}
                    </a>  
                  </li>
                </ul>
                <p>{{$product->deskripsi}}</p>
              <form action="/pesan/{{$product->id_produk}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="product_count">
                    <label for="qty">Jumlah Pesan:</label>
                    <input type="text" name="qty">
                    
                  </div>
                  <div class="card_area">
                    {{-- <a class="main_btn" href="#" data-toggle="modal" data-target="#exampleModal">Pesan</a> --}}
                    <button type="submit" class="main_btn">Tambah Ke Keranjang</button>
                  </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--================End Single Product Area =================-->
  
  
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Masukan Data Yang Dibutuhkan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/penawaran" method="POST">
                @csrf
                <input type="hidden" class="form-control" id="exampleInputEmail1" name="kode_pemesanan" aria-describedby="emailHelp">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">WhatsApp</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="no_wa" aria-describedby="emailHelp">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </form>
                </div>
          </div>
        </div>
      </div>
@endsection