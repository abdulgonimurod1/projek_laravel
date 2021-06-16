@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Hubungi Kami")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hubungi Kami</h1>
          </div>

          <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @foreach ($contact as $kontak)
                        @if($kontak != null)
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
                              <th class="align-middle" scope="col">Nama Perusahaan</th>
                              <th class="align-middle" scope="col">Alamat</th>
                              <th class="align-middle" scope="col">Telepon</th>
                              <th class="align-middle" scope="col">Email</th>
                              <th class="align-middle" scope="col">WhatsApp</th>
                              <th class="align-middle" scope="col">Maps</th>
                              <th class="align-middle" scope="col">Tampilkan</th>
                              <th class="align-middle" scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <tr>
                              <th scope="col">{{ $loop->iteration }}</th>
                              <td scope="col">{{$kontak->judul}}</td>
                              <td scope="col">{{$kontak->alamat}}</td>
                              <td scope="col">{{$kontak->telepon}}</td>
                              <td scope="col">{{$kontak->email}}</td>
                              <td scope="col">{{$kontak->wa}}</td>
                              <td scope="col">{{$kontak->maps}}</td>
                              <td scope="col">@if($kontak->tampilkan == "Y")Ya @endif @if($kontak->tampilkan == "N")Tidak @endif</td>
                              <td align="center">
                              <a href="kontak/edit/{{$kontak->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                              </td>
                            </tr>
                          </tbody>
                          @else
                          
                        <a href="{{route ('kontak.tambah')}}" class="btn btn-outline-primary my-2">Tambah Hubungi Kami</a>
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
                              <th class="align-middle" scope="col">Nama Perusahaan</th>
                              <th class="align-middle" scope="col">Alamat</th>
                              <th class="align-middle" scope="col">Telepon</th>
                              <th class="align-middle" scope="col">Email</th>
                              <th class="align-middle" scope="col">WhatsApp</th>
                              <th class="align-middle" scope="col">Maps</th>
                              <th class="align-middle" scope="col">Tampilkan</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <tr>
                              <th scope="col">{{ $loop->iteration }}</th>
                              <td scope="col">{{$kontak->judul}}</td>
                              <td scope="col">{{$kontak->alamat}}</td>
                              <td scope="col">{{$kontak->telepon}}</td>
                              <td scope="col">{{$kontak->email}}</td>
                              <td scope="col">{{$kontak->wa}}</td>
                              <td scope="col">{{$kontak->maps}}</td>
                              <td scope="col">@if($kontak->tampilkan == "Y")Ya @endif @if($kontak->tampilkan == "N")Tidak @endif</td>
                              
                            </tr>
                          </tbody>
                          @endif
                            @endforeach
                        </table>
                      </div>
                    </div>
                </div>

            </div>
    </div>

</div>
@endsection