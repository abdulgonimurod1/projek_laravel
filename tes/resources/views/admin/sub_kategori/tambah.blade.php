@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Tambah Sub Kategori")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sub Kategori</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Sub Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('sub_kategori.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="namaProduk">Sub Kategori</label>
                        <input type="text" class="form-control @error('sub_kategori') is-invalid @enderror" value="{{old('sub_kategori')}}" name="sub_kategori">
                                @error('sub_kategori')    
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
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{route('sub_kategori.index')}}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>

        </div>
      </div>
</div>
@endsection