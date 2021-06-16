@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Tambah Produk")
    
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="namaProduk">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" value="{{old('nama_produk')}}" name="nama_produk">
                                @error('nama_produk')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5" value="{{old('deskripsi')}}">{{old('deskripsi')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{old('stok')}}">
                            @error('stok')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control  @error('harga') is-invalid @enderror" name="harga" value="{{old('harga')}}">
                            @error('harga')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Utama</label>
                            <input type="file" class="form-control-file @error('gambar1') is-invalid @enderror" name="gambar1" id="gambar1" value="{{old('gambar1')}}">
                            <small id="GambarUtamaHelpBlock" class="form-text text-muted">
                                Ukuran Gambar Min: W= 255px, H= 255px
                            </small>    
                                @error('gambar1')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <div class="form-group">
                            <label for="gambar">Gambar 2</label>
                            <input type="file" class="form-control-file @error('gambar2') is-invalid @enderror" name="gambar2" id="gambar2" value="{{old('gambar2')}}">
                            <small id="GambarUtamaHelpBlock" class="form-text text-muted">
                                Ukuran Gambar Min: W= 255px, H= 255px
                            </small>    
                                @error('gambar2')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <div class="form-group">
                            <label for="gambar">Gambar 3</label>
                            <input type="file" class="form-control-file @error('gambar3') is-invalid @enderror" name="gambar3" id="gambar3" value="{{old('gambar3')}}">
                            <small id="GambarUtamaHelpBlock" class="form-text text-muted">
                                Ukuran Gambar Min: W= 255px, H= 255px
                            </small>    
                                @error('gambar3')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        
                          <div class="form-group">
                            <label for="link_facebook">Link Facebook</label>
                            <input type="text" class="form-control  @error('link_facebook') is-invalid @enderror" name="link_facebook" value="{{old('link_facebook')}}">
                            @error('link_facebook')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                          
                          <div class="form-group">
                            <label for="link_instagram">Link Instagram</label>
                            <input type="text" class="form-control  @error('link_instagram') is-invalid @enderror" name="link_instagram" value="{{old('link_instagram')}}">
                            @error('link_instagram')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                        
                          <div class="form-group">
                            <label for="link_lazada">Link Lazada</label>
                            <input type="text" class="form-control  @error('link_lazada') is-invalid @enderror" name="link_lazada" value="{{old('link_lazada')}}">
                            @error('link_lazada')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                          
                        
                          <div class="form-group">
                            <label for="link_bukalapak">Link Bukalapak</label>
                            <input type="text" class="form-control  @error('link_bukalapak') is-invalid @enderror" name="link_bukalapak" value="{{old('link_bukalapak')}}">
                            @error('link_bukalapak')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                          
                          
                          <div class="form-group">
                            <label for="link_shopee">Link Shopee</label>
                            <input type="text" class="form-control  @error('link_shopee') is-invalid @enderror" name="link_shopee" value="{{old('link_shopee')}}">
                            @error('link_shopee')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                          
                          
                          <div class="form-group">
                            <label for="link_tokopedia">Link Tokopedia</label>
                            <input type="text" class="form-control  @error('link_tokopedia') is-invalid @enderror" name="link_tokopedia" value="{{old('link_tokopedia')}}">
                            @error('link_tokopedia')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                          </div>
                        
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="id_kategori" id="">
                                <option selected value="" disabled>Pilih Kategori</option>
                                @foreach ($category as $kategori)
                                <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="tampilkan">Tampilkan</label>
                            <select type="text" class="form-control @error('tampilkan') is-invalid @enderror" name="tampilkan" id="tampilkan" autocomplete="off" value="{{old('tampilkan')}}">
                                <option selected disabled value="">Tampilkan</option>
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                                @error('tampilkan')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{route('produk.index')}}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    
@endsection