@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Cara_Pemesanan")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cara Pemesanan</h1>
          </div>

          <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a href="{{route ('cara_pemesanan.tambah')}}" class="btn btn-outline-primary my-2">Tambah Cara Pemesanan</a>
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
                              <th class="align-middle" scope="col">#</th>
                              <th class="align-middle" scope="col">Logo</th>
                              <th class="align-middle" scope="col">Judul</th>
                              <th class="align-middle" scope="col">Langkah 1</th>
                              <th class="align-middle" scope="col">Langkah 2</th>
                              <th class="align-middle" scope="col">Langkah 3</th>
                              <th class="align-middle" scope="col">Langkah 4</th>
                              <th class="align-middle" scope="col">Langkah 5</th>
                              <th class="align-middle" scope="col">Langkah 6</th>
                              <th class="align-middle" scope="col">Langkah 7</th>
                              <th class="align-middle" scope="col">Langkah 8</th>
                              <th class="align-middle" scope="col">Langkah 9</th>
                              <th class="align-middle" scope="col">Langkah 10</th>
                              <th class="align-middle" scope="col">Tampilkan</th>
                              <th class="align-middle" scope="col" width="80px;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($text as $cara)
                                <tr align="center">
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td><img src="{{ URL::to('/')}}/public/images/cara_pemesanan/{{$cara->gambar }}" width="100px" class="img-thumbnail"></td>
                                  <td>{{ $cara->judul }}</td>
                                  <td>{{ $cara->langkah1 }}</td>
                                  <td>{{ $cara->langkah2 }}</td>
                                  <td>{{ $cara->langkah3 }}</td>
                                  <td>{{ $cara->langkah4 }}</td>
                                  <td>{{ $cara->langkah5 }}</td>
                                  <td>{{ $cara->langkah6 }}</td>
                                  <td>{{ $cara->langkah7 }}</td>
                                  <td>{{ $cara->langkah8 }}</td>
                                  <td>{{ $cara->langkah9 }}</td>
                                  <td>{{ $cara->langkah10 }}</td>
                                  <td>{{ $cara->tampilkan }}</td>
                                  <td align="center">
                                  <a href="cara_pemesanan/edit/{{$cara->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="cara_pemesanan/hapus/{{$cara->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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