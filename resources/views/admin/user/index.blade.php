@extends('layout_admin.master')
@section('title', "Shakeela's Mart - User")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User</h1>
          </div>

          <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                              <th class="align-middle" scope="col">Nama</th>
                              <th class="align-middle" scope="col">Email</th>
                              <th class="align-middle" scope="col">Username</th>
                              <th class="align-middle" scope="col">Role</th>
                              <th class="align-middle" scope="col">Is Active</th>
                              <th class="align-middle" scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($user as $users)
                            <tr align="center">
                              <th scope="col">{{ $loop->iteration }}</th>
                              <td scope="col">{{$users->name}}</td>
                              <td scope="col">{{$users->email}}</td>
                              <td scope="col">{{$users->username}}</td>
                              <td scope="col">{{$users->role}}</td>
                              <td scope="col">{{$users->is_active}}</td>
                              <td align="center">
                                    <a href="user/edit/{{$users->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="user/hapus/{{$users->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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