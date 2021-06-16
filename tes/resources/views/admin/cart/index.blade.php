@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Keranjang")
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
                              <th class="align-middle" scope="col">Kode Pesanan</th>
                              <th class="align-middle" scope="col">Nama</th>
                              <th class="align-middle" scope="col">Tanggal</th>
                              <th class="align-middle" scope="col">Total Harga</th>
                              <th class="align-middle" scope="col">Status</th>
                              <th class="align-middle" scope="col" width="100px;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($cart as $keranjang)
                                <tr align="center">
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $keranjang->kode_pesanan }}</td>
                                  <td>{{ $keranjang->user->name }}</td>
                                  <td>{{ $keranjang->tanggal }}</td>
                                  <td align="right">Rp. {{ number_format($keranjang->total_harga) }}</td>
                                  <td>@if($keranjang->status == "1") Sudah Dipesan @endif @if($keranjang->status == "0") Masih di Cart @endif @if($keranjang->status == "2") Sudah Selesai @endif</td>
                                  <td align="center">
                                    <a href="order/edit/{{$keranjang->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/order_detail/{{$keranjang->id}}" class="btn btn-sm btn-primary"><i class="fas fa-clipboard-list"></i></a>
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