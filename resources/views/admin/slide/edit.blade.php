@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Edit Slider")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Slide</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Slide</h6>
                </div>
                <div class="card-body">
                    <form action="/slider/edit/{{$sliders->id}}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{$sliders->gambar}}">
                            <img src="{{ URL::to('/')}}/public/images/slider/{{$sliders->gambar}}" alt="" width="100px" class="my-2 img-thumbnail">    
                            <input type="hidden" name="hidden_image" value="{{$sliders->gambar}}">
                            <small id="GambarUtamaHelpBlock" class="form-text text-muted">
                                Ukuran Gambar Min: W= 1920px, H= 790px
                            </small>    
                                @error('gambar')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                         </div>
                        <div class="form-group">
                            <label for="tampilkan">Tampilkan</label>
                            <select type="text" class="form-control @error('tampilkan') is-invalid @enderror" name="tampilkan" id="tampilkan" autocomplete="off" value="{{old('tampilkan')}}">
                                <option selected value="{{$sliders->tampilkan}}">{{$sliders->tampilkan}}</option>
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                                @error('tampilkan')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('slider.index')}}" class="btn btn-warning">Batal</a>
                    </form>
                </div>
            </div>

        </div>
</div>
    
@endsection