@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Edit Owner")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Owner</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Owner</h6>
                </div>
                <div class="card-body">
                    <form action="/owner/edit/{{ $owners->id }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="owner">Nama Owner</label>
                            <input type="text" class="form-control  @error('owner') is-invalid @enderror" name="owner" value="{{$owners->owner}}">
                            @error('owner')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Deskripsi</label>
                            <textarea class="form-control  @error('alamat') is-invalid @enderror" name="deskripsi" value="{{$owners->deskripsi}}" cols="30" rows="10">{{$owners->deskripsi}}</textarea>
                            @error('alamat')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tampilkan">Tampilkan</label>
                            <select type="text" class="form-control @error('tampilkan') is-invalid @enderror" name="tampilkan" id="tampilkan" autocomplete="off" value="{{old('tampilkan')}}">
                                <option selected value="{{$owners->tampilkan}}">{{$owners->tampilkan}}</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                                @error('tampilkan')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <div class="form-group">
                            <label for="gambar">Poto</label>
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
                            <img src="{{ URL::to('/')}}/images/Owner/{{$owners->gambar}}" alt="" width="100px" class="my-2 img-thumbnail">    
                            <input type="hidden" name="hidden_image" value="{{$owners->gambar}}">    
                                @error('gambar')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('owner.index')}}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    
@endsection