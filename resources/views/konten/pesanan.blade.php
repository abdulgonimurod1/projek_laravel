@extends('halaman_utama.index')
@section('title', 'Shakeela Mart')
@section('content')
      <!--================Cart Area =================-->
      <section class="cart_area" style="background-color: #fff;">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              @if(!@empty($cart))
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" width="500">Produk</th>
                    <th scope="col" style="text-align: center">Harga</th>
                    <th scope="col" width="50" style="text-align: center">Kuantitas</th>
                    <th scope="col" width="200" style="text-align: center">Total</th>
                    <th scope="col">Status Pesanan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cart_detail as $item)
                    @php
                      $produk_name = \App\Product::where('id_produk',$item->id_produk)->first();
                    @endphp 
                    <tr>
                      <td>    
                        <img src="{{ URL::to('/public/images/produk/' . $produk_name->gambar1) }}" style="width: 100px; height:auto; margin-right:10px;"/>
                        {{ $produk_name->nama_produk }}
                      </td>
                      <td style="text-align: center">Rp. {{ number_format($produk_name->harga) }}</td>
                      <td style="text-align: center">{{ $item->jumlah }}</td>
                      <td style="text-align: center">Rp. {{ number_format($item->jumlah_harga) }}</td>
                      <td>
                        @if($cart->status == 1)
                          Pesanan Diterima
                        @elseif($cart->status == 2)
                          Pesanan Dalam Perjalanan
                        @else
                          Pesanan Selesai
                        @endif
                      </td>
                    </tr> 
                  @endforeach
                  <tr>
                    <td colspan="5">
                      <center>
                        <a class="main_btn" href="{{url('/shop_page')}}">Pergi ke halaman belanja</a>
                      </center>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
              @else
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" width="500">Produk</th>
                    <th scope="col" style="text-align: center">Harga</th>
                    <th scope="col" width="50" style="text-align: center">Kuantitas</th>
                    <th scope="col" width="200" style="text-align: center">Total</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td colspan="2" style="text-align: right;"><b style=" color:#797979">Total Harga :</b> </td>
                    <td style="text-align: center">
                      Rp.
                    </td>
                    <td></td>
                  </tr>
                  <tr class="out_button_area">
                    <td colspan="5">
                      <div class="checkout_btn_inner">
                        <center>
                          <a class="main_btn" href="{{url('/shop_page')}}">Pergi ke halaman belanja</a>
                        </center>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              @endif
            </div>
          </div>
        </div>
      </section>
      <!--================End Cart Area =================-->
@endsection