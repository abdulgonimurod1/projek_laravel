@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Owner")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Owner</h1>
          </div>

          <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a href="{{route ('owner.tambah')}}" class="btn btn-outline-primary my-2">Tambah Owner</a>
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
                              <th class="align-middle" scope="col">Nama Owner</th>
                              <th class="align-middle" scope="col">Poto</th>
                              <th class="align-middle" scope="col">Deskripsi</th>
                              <th class="align-middle" scope="col">Tampilkan</th>
                              <th class="align-middle" scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($owners as $owner)
                            <tr align="center">
                              <th scope="col">{{ $loop->iteration }}</th>
                              <td scope="col">{{$owner->owner}}</td>
                              <td><img src="{{ URL::to('/')}}/public/images/Owner/{{$owner->gambar}}" alt="" width="100px" class="img-thumbnail"></td>
                              <td scope="col">{{$owner->deskripsi}}</td>
                              <td scope="col">{{$owner->tampilkan}}</td>
                              <td align="center">
                              <a href="owner/edit/{{$owner->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="owner/hapus/{{$owner->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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