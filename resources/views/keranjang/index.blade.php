@extends('halaman_utama.index')
@section('title', 'Shakeela Mart - Keranjang')
    
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
          <div class="container">
            <div
              class="banner_content d-md-flex justify-content-between align-items-center"
            >
              <div class="mb-3 mb-md-0">
                <h2>Keranjang</h2>
              </div>
              <div class="page_link">
                <a href="/">Beranda</a>
                <a href="/keranjang">Keranjang</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================End Home Banner Area =================-->
  
      <!--================Cart Area =================-->
      <section class="cart_area">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" width="400">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col" width="200">Total</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($cart as $keranjang)
                    <td>
                      <div class="media">
                        <div class="d-flex">
                          <img
                           src="{{ Storage::url($keranjang->product->gambar1)}}" width="150"
                           alt=""
                          />
                        </div>
                        <div class="media-body">
                          <p>{{$keranjang->product->nama_produk}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5>Rp. {{ number_format( $keranjang->harga )}}</h5>
                    </td>
                    <td>
                      <div class="product_count">
                        {{-- <input
                          type="text"
                          name="qty"
                          id="sst"
                          maxlength="12"
                         value="{{$keranjang->qty}}"
                          title="Quantity:"
                          class="input-text qty disabled"
                        /> --}}
                        <input class="form-control" type="text" value="{{$keranjang->qty}}" readonly>
                      </div>
                    </td>
                    <td>
                      <h5>Rp. {{ number_format( $keranjang->total )}}</h5>
                    </td>
                    <td>
                      <a href="keranjang/hapus/{{$keranjang->id}}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  {{-- <tr class="shipping_area">
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Shipping</h5>
                    </td>
                    <td>
                      <div class="shipping_box">
                        <ul class="list">
                          <li>
                            <a href="#">Flat Rate: $5.00</a>
                          </li>
                          <li>
                            <a href="#">Free Shipping</a>
                          </li>
                          <li>
                            <a href="#">Flat Rate: $10.00</a>
                          </li>
                          <li class="active">
                            <a href="#">Local Delivery: $2.00</a>
                          </li>
                        </ul>
                        <h6>
                          Calculate Shipping
                          <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </h6>
                        <select class="shipping_select">
                          <option value="1">Bangladesh</option>
                          <option value="2">India</option>
                          <option value="4">Pakistan</option>
                        </select>
                        <select class="shipping_select">
                          <option value="1">Select a State</option>
                          <option value="2">Select a State</option>
                          <option value="4">Select a State</option>
                        </select>
                        <input type="text" placeholder="Postcode/Zipcode" />
                        <a class="gray_btn" href="#">Update Details</a>
                      </div>
                    </td>
                  </tr> --}}
                  @endforeach
                  <tr class="out_button_area">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <div class="checkout_btn_inner">
                        <a class="gray_btn" href="/">Continue Shopping</a>
                        <a class="main_btn" data-toggle="modal" data-target="#exampleModal" href="">Pesan</a>
                      </div>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
      <!--================End Cart Area =================-->
@endsection