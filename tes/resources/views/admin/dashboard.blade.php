@extends('layout_admin.master')
@section('title', 'Shakeela Mart - Dashboard')

@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="row">

            <!-- User -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Produk -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Produk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$product}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-shopping-bag fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{--<!-- Cart -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cart</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$cart}}</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>--}}

            <!-- Pesan -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pesan}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-envelope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Web View -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengunjung</div>
                      @foreach($view as $v)
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$v->view}}</div>
                      @endforeach()
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-eye fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                          <thead class="thead-dark text-center">
                            <tr>
                              <th class="align-middle" scope="col">#</th>
                              <th class="align-middle" scope="col">Nama</th>
                              <th class="align-middle" scope="col">Email</th>
                              <th class="align-middle" scope="col">Telepon</th>
                              <th class="align-middle" scope="col">Subjek</th>
                              <th class="align-middle" scope="col">Pesan</th>
                              <th class="align-middle" scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($kontak as $p)
                            <tr align="center">
                              <th scope="col">{{ $loop->iteration }}</th>
                              <td scope="col">{{$p->nama}}</td>
                              <td scope="col">{{$p->email}}</td>
                              <td scope="col">{{$p->telepon}}</td>
                              <td scope="col">{{$p->subjek}}</td>
                              <td scope="col">{{$p->Pesan}}</td>
                              <td align="center">
                                <a href="#" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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