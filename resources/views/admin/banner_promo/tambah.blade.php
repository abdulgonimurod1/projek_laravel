@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Tambah Banner")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Banner</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{old('gambar')}}">
                                @error('gambar')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <div class="form-group">
                            <label for="link_promo">Link Promo</label>
                            <input type="text" class="form-control @error('link_promo') is-invalid @enderror" name="link_promo" id="link_promo" value="{{old('link_promo')}}">
                                @error('link_promo')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
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
                        <a href="{{route('banner.index')}}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>

        </div>
      </div>
</div>
    
@endsection