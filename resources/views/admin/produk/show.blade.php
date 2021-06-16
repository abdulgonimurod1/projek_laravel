@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Tambah Produk")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        <a href="{{route('produk.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Kembali</a>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
                </div>
                <div class="card-body">
                    <form>
                      <div class="form-row">
                        <div class="col">
                          <label for="namaProduk">Nama Produk</label>
                          <input type="text" class="form-control" readonly value="{{$product->nama_produk}}">
                        </div>
                        <div class="col">
                          <label for="namaProduk">Produk Dilihat</label>  
                          <input type="text" class="form-control" readonly value="{{$product->dilihat}}">
                        </div>
                        
                      </div>
                      <div class="form-row mt-3">
                        <div class="col">
                            <label for="namaProduk">Harga</label>
                          <input type="text" class="form-control" readonly value="Rp. {{ number_format($product->harga) }}">
                        </div>
                        <div class="col">
                            <label for="namaProduk">Harga Diskon</label>
                          <input type="text" class="form-control" readonly value="Rp. {{ number_format($product->harga_diskon) }}">
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <div class="col">
                            <label for="namaProduk">Gambar Utama</label></br>
                          <img src="{{ URL::to('/')}}/public/images/produk/{{$product->gambar1}}" alt="" width="100px" class="my-2 img-thumbnail">
                        </div>
                        <div class="col">
                            <label for="namaProduk">Gambar 2</label></br>
                          <img src="{{ URL::to('/')}}/public/images/produk/{{$product->gambar2}}" alt="" width="100px" class="my-2 img-thumbnail">
                        </div>
                        <div class="col">
                            <label for="namaProduk">Gambar 3</label></br>
                          <img src="{{ URL::to('/')}}/public/images/produk/{{$product->gambar3}}" alt="" width="100px" class="my-2 img-thumbnail">
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <div class="col">
                            <label for="namaProduk">Kategori</label>
                          <input type="text" class="form-control" readonly value="{{$product->category->nama_kategori}}">
                        </div>
                        <div class="col">
                            <label for="namaProduk">Jenis Produk</label>
                          <input type="text" class="form-control" readonly value="{{$product->jenis_produk}}">
                        </div>
                      </div>
                      
                      <div class="form-row">
                        <div class="col">
                           <label>Link Facebook</label>
                          <input type="text" class="form-control" readonly value="{{$product->link_facebook}}">
                        </div>
                        <div class="col">
                           <label>Link Instagram</label>
                          <input type="text" class="form-control" readonly value="{{$product->link_instagram}}">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                           <label>Link Lazada</label>
                          <input type="text" class="form-control" readonly value="{{$product->link_lazada}}">
                        </div>
                        <div class="col">
                           <label>Link Bukalapak</label>
                          <input type="text" class="form-control" readonly value="{{$product->link_bukalapak}}">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                          <label>Link Shopee</label>
                          <input type="text" class="form-control" readonly value="{{$product->link_shopee}}">
                        </div>
                        <div class="col">
                            <label>Link Tokopedia</label>
                          <input type="text" class="form-control" readonly value="{{$product->link_tokopedia}}">
                        </div>
                      </div>
                    
                        <div class="form-row mt-3">
                            <div class="col">
                                <label>Deskripsi</label>   
                              <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5" value="{{$product->deskripsi}}">{{$product->deskripsi}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
        </div>
    
@endsection