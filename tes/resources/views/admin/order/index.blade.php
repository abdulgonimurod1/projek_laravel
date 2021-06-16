@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Order")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order</h1>
          </div>

          <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    
                          @if (session('success'))
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>     
                          @endif
                          <thead class="thead-dark text-center">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Order Id</th>
                              <th scope="col">Invoice</th>
                              <th scope="col">User Id</th>
                              <th scope="col">Total Harga</th>
                              <th scope="col">Status Pemesanan</th>
                              <th scope="col" width="100px;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($order as $pesan)
                                <tr>
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $pesan->order_id }}</td>
                                  <td>{{ $pesan->invoice }}</td>
                                  <td>{{ $pesan->user_id }}</td>
                                  <td>{{ $pesan->total_harga }}</td>
                                  <td>{{ $pesan->status_pemesanan }}</td>
                                  <td align="center">
                                  <a href="order/edit/{{$pesan->order_id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="order/hapus/{{$pesan->order_id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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