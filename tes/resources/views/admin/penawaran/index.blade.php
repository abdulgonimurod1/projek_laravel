@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Penawaran")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penawaran</h1>           
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
                              <th class="align-middle" scope="col">Kode Penawaran</th>
                              <th class="align-middle" scope="col">Produk</th>
                              <th class="align-middle" scope="col">Nama</th>
                              <th class="align-middle" scope="col">Alamat</th>
                              <th class="align-middle" scope="col" >Email</th>
                              <th class="align-middle" scope="col">WhatsApp</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($penawaran as $p)
                                <tr align="center">
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $p->kode_penawaran }}</td>
                                  <td>{{ $p->produk->nama_produk }}</td>
                                  <td>{{ $p->nama }}</td>
                                  <td>{{ $p->alamat }}</td>
                                  <td>{{ $p->email }}</td>
                                  <td>{{ $p->nomer_wa }}</td>
                                 
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