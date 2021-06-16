@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Cara Pemesanan")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cara Pemesanan</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cara Pemesanan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cara_pemesanan.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="judul">Judul</label>
                              <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}" name="judul">
                                @error('judul')    
                                    <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gambar">Logo</label>
                                <input type="file" class="form-control-file" name="gambar" id="gambar" value="{{old('gambar')}}">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="step1">Langkah 1</label>
                                <input type="text" class="form-control" name="step1" value="{{old('langkah1')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="step2">Langkah 2</label>
                                <input type="text" class="form-control" name="step2" value="{{old('langkah2')}}">
                            </div>
                            
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="step3">Langkah 3</label>
                                <input type="text" class="form-control" name="step3" value="{{old('langkah3')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="step4">Langkah 4</label>
                                <input type="text" class="form-control" name="step4" value="{{old('langkah4')}}">
                            </div>
                            
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="step5">Langkah 5</label>
                                <input type="text" class="form-control" name="step5" value="{{old('langkah5')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="step6">Langkah 6</label>
                                <input type="text" class="form-control" name="step6" value="{{old('langkah6')}}">
                            </div>
                            
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="step7">Langkah 7</label>
                                <input type="text" class="form-control" name="step7" value="{{old('langkah7')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="step8">Langkah 8</label>
                                <input type="text" class="form-control" name="step8" value="{{old('langkah8')}}">
                            </div>
                            
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="step9">Langkah 9</label>
                                <input type="text" class="form-control" name="step9" value="{{old('langkah9')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="step10">Langkah 10</label>
                                <input type="text" class="form-control" name="step10" value="{{old('langkah10')}}">
                            </div>
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
                        <hr class="mt-4">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{route('cara_pemesanan.index')}}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    
@endsection