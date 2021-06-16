@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Edit Produk")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
                </div>
                <div class="card-body">
                    <form action="/produk/edit/{{$product->id_produk}}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="namaProduk">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" value="{{$product->nama_produk}}" name="nama_produk">
                                @error('nama_produk')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5" value="{{old('deskripsi')}}">{{$product->deskripsi}}</textarea>
                            @error('deskripsi')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" name="stok" value="{{$product->stok}}">
                            @error('stok')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input class="form-control" type="text" name="harga" value="{{$product->harga}}">
                            @error('harga')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga_diskon">Harga Diskon</label>
                            <input class="form-control" type="text" name="harga_diskon" value="{{$product->harga_diskon}}">
                            <small id="hargadiskonHelpBlock" class="form-text text-muted">
                                Isi Ketika anda memilih option jenis produk = "Promo"
                            </small>
                            @error('harga_diskon')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file @error('gambar1') is-invalid @enderror" name="gambar1" id="gambar1" value="{{$product->gambar1}}">
                            <img src="{{ URL::to('/')}}/public/images/produk/{{$product->gambar1}}" alt="" width="100px" class="my-2 img-thumbnail">    
                            <input type="hidden" name="hidden_image1" value="{{$product->gambar1}}">   
                            <small id="GambarUtamaHelpBlock" class="form-text text-muted">
                                Ukuran Gambar Min: W= 255px, H= 255px
                            </small>
                                @error('gambar1')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                         </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file @error('gambar2') is-invalid @enderror" name="gambar2" id="gambar2" value="{{$product->gambar2}}">
                            <img src="{{ URL::to('/')}}/public/images/produk/{{$product->gambar2}}" alt="" width="100px" class="my-2 img-thumbnail">    
                            <input type="hidden" name="hidden_image2" value="{{$product->gambar2}}">
                             <small id="GambarUtamaHelpBlock" class="form-text text-muted">
                                Ukuran Gambar Min: W= 255px, H= 255px
                            </small>
                                @error('gambar2')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                         </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file @error('gambar3') is-invalid @enderror" name="gambar3" id="gambar3" value="{{$product->gambar3}}">
                            <img src="{{ URL::to('/')}}/public/images/produk/{{$product->gambar3}}" alt="" width="100px" class="my-2 img-thumbnail">    
                            <input type="hidden" name="hidden_image3" value="{{$product->gambar3}}">    
                            <small id="GambarUtamaHelpBlock" class="form-text text-muted">
                                Ukuran Gambar Min: W= 255px, H= 255px
                            </small>
                                @error('gambar3')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                         </div>
                                                 
                          <div class="form-group">
                            <label for="link_facebook">Link Facebook</label>
                            <input type="text" class="form-control  @error('link_facebook') is-invalid @enderror" name="link_facebook" value="{{$product->link_facebook}}">
                            @error('link_facebook')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                          
                          <div class="form-group">
                            <label for="link_instagram">Link Instagram</label>
                            <input type="text" class="form-control  @error('link_instagram') is-invalid @enderror" name="link_instagram" value="{{$product->link_instagram}}">
                            @error('link_instagram')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                        
                          <div class="form-group">
                            <label for="link_bukalapak">Link Bukalapak</label>
                            <input type="text" class="form-control  @error('link_bukalapak') is-invalid @enderror" name="link_bukalapak" value="{{$product->link_bukalapak}}">
                            @error('link_bukalapak')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                          
                         <div class="form-group">
                            <label for="link_lazada">Link Lazada</label>
                            <input class="form-control" type="text" name="link_lazada" value="{{$product->link_lazada}}">
                            @error('link_lazada')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="link_shopee">Link Shopee</label>
                            <input class="form-control" type="text" name="link_shopee" value="{{$product->link_shopee}}">
                            @error('link_shopee')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        
                         <div class="form-group">
                            <label for="link_tokopedia">Link Tokopedia</label>
                            <input class="form-control" type="text" name="link_tokopedia" value="{{$product->link_tokopedia}}">
                            @error('link_tokopedia')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="id_kategori" id="">
                                <option selected value="{{$product->id_kategori}}">{{$product->category->nama_kategori}}</option>
                                @foreach ($category as $kategori)
                                    <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tampilkan">Tampilkan</label>
                            <select type="text" class="form-control @error('tampilkan') is-invalid @enderror" name="tampilkan" id="tampilkan" autocomplete="off" value="{{old('tampilkan')}}">
                                <option selected value="{{$product->tampilkan}}">{{$product->tampilkan}}</option>
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                                @error('tampilkan')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                          <div class="form-group">
                            <label for="jenis_produk">Jenis Produk</label>
                            <select type="text" class="form-control @error('jenis_produk') is-invalid @enderror" name="jenis_produk" id="jenis_produk" autocomplete="off" value="{{old('jenis_produk')}}">
                                <option selected value="{{$product->jenis_produk}}">{{$product->jenis_produk}}</option>
                                <option value="promo">Promo</option>
                                <option value="top produk">Top Produk</option>
                                <option value="produk baru">Produk Baru</option>
                            </select>
                                @error('jenis_produk')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('produk.index')}}" class="btn btn-warning">Batal</a>
                    </form>
                </div>
            </div>

        </div>
</div>
    
@endsection