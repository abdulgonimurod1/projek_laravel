@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Sub Kategori")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sub Kategori</h1>
          </div>

          <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    
                        <a href="{{route ('sub_kategori.tambah')}}" class="btn btn-outline-primary my-2">Tambah Sub Kategori</a>
                            @if (session('success'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>     
                            @endif
                          <thead class="thead-dark text-center">
                            <tr>
                              <th scope="col" width="45px;">#</th>
                              <th scope="col" width="300px;">Sub Kategori</th>
                              <th scope="col" width="190px;">Kategori</th>
                              <th scope="col" width="100px;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($sub_category as $sub_kategori)
                                <tr>
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $sub_kategori->sub_kategori }}</td>
                                  <td>{{ $sub_kategori->category->nama_kategori }}</td>
                                  <td align="center">
                                    <a href="sub_kategori/edit/{{$sub_kategori->id_sub_kategori}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="sub_kategori/hapus/{{$sub_kategori->id_sub_kategori}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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