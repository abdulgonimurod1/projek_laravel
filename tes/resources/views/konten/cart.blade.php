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
                    <th scope="col">Option</th>
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
                      @if ($produk_name->jenis_produk == 'promo')
                        <td style="text-align: center">Rp.  {{ number_format($produk_name->harga_diskon) }} <span style="text-decoration: line-through;font-size: x-small;">Rp. {{ number_format($produk_name->harga) }}</span></td>
                      @else
                        <td style="text-align: center">Rp. {{ number_format($produk_name->harga) }}</td>
                      @endif
                      <td style="text-align: center">{{ $item->jumlah }}</td>
                      <td style="text-align: center">Rp. {{ number_format($item->jumlah_harga) }}</td>
                      <td>
                        <form action="{{ url('cart_view') }}/{{ $item->id }}" method="POST">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    
                  @endforeach
                  <tr>
                    <td></td>
                    <td colspan="2" style="text-align: right;"><b style=" color:#797979">Total Harga :</b> </td>
                    <td style="text-align: center">
                      Rp. {{ number_format($cart->total_harga) }}
                    </td>
                    <td></td>
                  </tr>
                  <tr class="out_button_area">
                    <td colspan="5">
                      <div class="checkout_btn_inner">
                        <center>
                          <a class="main_btn" data-toggle="modal" data-target="#exampleModal" href="">Buat Penawaran</a>
                        </center>
                      </div>
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
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      @if(!@empty($cart))
      <form action="{{ url('buatpenawaran') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="table-responsive">
            @php
              $pesanan_utama = \App\cart::where('user_id',Auth::user()->id)->where('status',0)->first();
              $cart_total = \App\cart_detail::where('cart_id',$pesanan_utama->id)->count();
              $n=1;
            @endphp 
            <table class="table">
              <thead>
                <tr>
                <td colspan="4"><h4 style="text-align: center">Konfirmasi Penawaran</h4></td>
                </tr>
                <tr>
                  <th scope="col" width="500">Produk</th>
                  <th scope="col" width="200" style="text-align: center">Harga</th>
                  <th scope="col" width="50" style="text-align: center">Kuantitas</th>
                  <th scope="col" width="200" style="text-align: center">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cart_detail as $item)
                  @php
                    $produk_name = \App\Product::where('id_produk',$item->id_produk)->first();
                  @endphp 
                  <tr>
                  <input type="hidden" name="cart_total" id="cart_total" value="{{ $cart_total }}">
                  <input type="hidden" name="cart_id" id="cart_id" value="{{ $cart->id }}">
                    {{-- order save --}}
                  <input type="hidden" name="produk_id" id="produk_id" value="{{ $item->id }}">
                  <input type="hidden" name="total_harga" id="total_harga" value="{{ $cart->total_harga }}">
                    {{-- order detail save --}}
                  <input type="hidden" name="product_id[]" id="product_id[]" value="{{ $item->product_id }}">
                  <input type="hidden" name="jumlah[]" id="jumlah[]" value="{{ $item->jumlah }}">
                  <input type="hidden" name="harga[]" id="harga[]" value="{{ $item->jumlah_harga }}">
                    <td>    
                      <img src="{{ URL::to('/public/images/produk/' . $produk_name->gambar1) }}" style="width: 100px; height:auto; margin-right:10px;"/>
                      {{ $produk_name->nama_produk }}
                    </td>
                    <td style="text-align: center">Rp. {{ number_format($produk_name->harga) }}</td>
                    <td style="text-align: center">{{ $item->jumlah }}</td>
                    <td style="text-align: center">Rp. {{ number_format($item->jumlah_harga) }}</td>
                  </tr> 
                @endforeach
                <tr>
                  <td></td>
                  <td colspan="2" style="text-align: right;"><b style=" color:#797979">Total Harga :</b> </td>
                  <td style="text-align: center">
                    Rp. {{ number_format($cart->total_harga) }}
                  </td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak. Batalkan Penawaran</button>
          <button type="submit" class="btn btn-success">Ya. Buat Penawaran</button>
        </div>
      </form>
      @endif
    </div>
  </div>
</div>
@endsection