@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Edit Kontak")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kontak</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Kontak</h6>
                </div>
                <div class="card-body">
                    <form action="/kontak/edit/{{$kontak->id}}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="judul">Nama Perusahaan</label>
                            <input type="text" class="form-control  @error('judul') is-invalid @enderror" name="judul" value="{{$kontak->judul}}">
                            @error('judul')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Perusahaan</label>
                            <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" value="{{$kontak->alamat}}" cols="30" rows="10">{{$kontak->alamat}}</textarea>
                            @error('alamat')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$kontak->email}}">
                            @error('email')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control  @error('telepon') is-invalid @enderror" name="telepon" value="{{$kontak->telepon}}">
                            @error('telepon')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="wa">WhatsApp</label>
                            <input type="text" class="form-control  @error('wa') is-invalid @enderror" name="wa" value="{{$kontak->wa}}">
                            @error('wa')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="maps">Maps</label>
                            <textarea class="form-control  @error('maps') is-invalid @enderror" name="maps" value="{{$kontak->maps}}" cols="30" rows="10">{{$kontak->maps}}</textarea>
                            @error('maps')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tampilkan">Tampilkan</label>
                            <select type="text" class="form-control @error('tampilkan') is-invalid @enderror" name="tampilkan" id="tampilkan" autocomplete="off" value="{{old('tampilkan')}}">
                                <option selected value="{{$kontak->tampilkan}}">@if($kontak->tampilkan == "Y")Ya @endif @if($kontak->tampilkan == "N")Tidak @endif</option>
                                <option value="Y">Ya</option>
                                <option value="N">Tidak </option>
                            </select>
                                @error('tampilkan')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('kontak.index')}}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    
@endsection