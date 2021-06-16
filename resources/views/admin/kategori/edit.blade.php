@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Edit Kategori")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="/kategori/edit/{{$kategori->id_kategori}}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="namaKategori">Nama Kategori</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{$kategori->nama_kategori}}" name="nama_kategori">
                                @error('nama_kategori')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('nama_kategori') is-invalid @enderror" name="deskripsi" id="" cols="30" rows="5" value="{{old('deskripsi')}}">{{$kategori->deskripsi}}</textarea>
                                @error('nama_kategori')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
                            <img src="{{ URL::to('/')}}/public/images/kategori/{{$kategori->gambar}}" alt="" width="100px" class="my-2 img-thumbnail">    
                            <input type="hidden" name="hidden_image" value="{{$kategori->gambar}}">
                            @error('gambar')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                         </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('kategori.index')}}" class="btn btn-warning">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    
@endsection