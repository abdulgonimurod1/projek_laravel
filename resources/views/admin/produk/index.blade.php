@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Produk")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produk</h1>           
            </div>

          <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a href="{{route ('produk.tambah')}}" class="btn btn-outline-primary my-2">Tambah Produk</a>
                        
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
                              <th class="align-middle" scope="col">Nama Produk</th>
                              <th class="align-middle" scope="col">Stok</th>
                              <th class="align-middle" scope="col">Gambar Utama</th>
                              <th class="align-middle" scope="col">Harga</th>
                              <th class="align-middle" scope="col" >Kategori</th>
                              <th class="align-middle" scope="col">Jenis Produk</th>
                              @php
                                $produk = \App\Product::where('harga_diskon', 0);
                              @endphp
                              @if($produk != null)
                              <th class="align-middle" scope="col">Harga Diskon</th>
                              @endif
                              <th class="align-middle" scope="col" width="60px;">Tampil</th>
                              <th class="align-middle" scope="col" width="90px;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($product as $produk)
                                <tr align="center">
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $produk->nama_produk }}</td>
                                  <td>{{ $produk->stok }}</td>
                                  <td><img src="{{ URL::to('/')}}/public/images/produk/{{$produk->gambar1}}" alt="" width="50px" class="img-thumbnail"></td>
                                  <td align="right">Rp. {{ number_format($produk->harga) }}</td>
                                  <td>{{ $produk->category->nama_kategori }}</td>
                                  <td>{{ $produk->jenis_produk }}</td>
                                  <td align="right">Rp. {{ number_format($produk->harga_diskon) }}</td>
                                  <td>{{ $produk->tampilkan }}</td>
                                  <td align="center">
                                    <a href="produk/detail/{{$produk->id_produk}}" class="btn btn-sm btn-primary"><i class="fas fa-clipboard-list"></i></a>
                                    <a href="produk/edit/{{$produk->id_produk}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="produk/hapus/{{$produk->id_produk}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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