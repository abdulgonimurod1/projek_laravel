@extends('layout_admin.master')
@section('title', 'Shakeela Mart - Kategori')
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
          </div>
          @if (session('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>     
                          @endif
          <div class="row">

            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
                    </div>
                    <div class="card-body">
                    <form action="{{route('kategori.simpan')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="namaKategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="gambar">Gambar</label>
                          <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{old('gambar')}}">
                              @error('gambar')    
                              <div class="invalid-feedback">{{$message}}</div> 
                              @enderror
                        </div>
                        <button type="reset" class="btn btn-danger mr-2" style="float:right;">Batal</button>
                        <button type="submit" class="btn btn-primary mr-2" style="float:right;">Tambah</button>
                    </form>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    
                             <thead class="thead-dark">
                                <tr style="text-align: center;">
                                  <th scope="col" width="50px;">#</th>
                                  <th scope="col" width="200px;">Nama Kategori</th>
                                  <th scope="col" width="200px;">Gambar</th>
                                  <th scope="col">Deskripsi</th>
                                  <th scope="col" width="100px;">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($category as $kategori)
                                  <tr style="text-align: center;">
                                    <th scope="col">{{ $loop->iteration }}</th>
                                    <td>{{ $kategori->nama_kategori }}</td>
                                    <td><img src="{{ URL::to('/')}}/public/images/kategori/{{$kategori->gambar}}" alt="" width="80px" class="img-thumbnail"></td>
                                    <td>{{ $kategori->deskripsi }}</td>
                                    <td>
                                        <a href="kategori/edit/{{$kategori->id_kategori}}" type="submit" class="btn btn-warning btn-sm"><span class="fas fa-edit"></span></a></button>
                                        <a href="kategori/hapus/{{$kategori->id_kategori}}" type="submit" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></a>
                                    </td>

                                  </tr>
                                  @endforeach
                              </tbody>
                            </table>
                          </div>
                    </div>
                </div>

            </div>
    </div>

</div>
@endsection