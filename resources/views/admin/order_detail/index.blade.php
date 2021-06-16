@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Order Detail")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
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
                              <th scope="col" width="18%">Order Detail Id</th>
                              <th scope="col">Order Id</th>
                              <th scope="col">Id Produk</th>
                              <th scope="col">Qty</th>
                              <th scope="col">Harga</th>
                              <th scope="col" width="100px;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($order_detail as $detail)
                                <tr>
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $detail->order_detail_id }}</td>
                                  <td>{{ $detail->order->order_id }}</td>
                                  <td>{{ $detail->product->id_produk }}</td>
                                  <td>{{ $detail->qty }}</td>
                                  <td>{{ $detail->harga }}</td>
                                  <td align="center">
                                  <a href="order/edit/{{$detail->order_id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="order/hapus/{{$detail->order_id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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