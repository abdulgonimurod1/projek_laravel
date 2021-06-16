@extends('layout_admin.master')
@section('title', "Shakeela's Mart - About Us")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tentang Kami</h1>
          </div>

          <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @foreach ($about_us as $konten)
                        @if($konten != null)
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
                              <th scope="col" width="45px;">#</th>
                              <th scope="col" width="300px;">Deskripsi</th>
                              <th scope="col" width="190px;">Gambar</th>
                              <th scope="col" width="190px;">Tampilkan</th>
                              <th scope="col" width="100px;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            
                                <tr>
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $konten->deskripsi }}</td>
                                  <td align="center"><img src="{{ URL::to('/')}}/public/images/Tentang_Kami/{{$konten->gambar}}" alt="" width="80px" class="img-thumbnail"></td>
                                  <td>{{$konten->tampilkan}}</td>
                                  <td align="center">
                                    <a href="about_us/edit/{{$konten->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/about_us/hapus/{{$konten->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                  </td>
                                </tr>
                          </tbody>
                        @else()
                        <a href="{{route ('about_us.tambah')}}" class="btn btn-outline-primary my-2">Tambah Tentang Kami</a>
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
                              <th scope="col" width="45px;">#</th>
                              <th scope="col" width="300px;">Deskripsi</th>
                              <th scope="col" width="190px;">Gambar</th>
                              <th scope="col" width="190px;">Tampilkan</th>
                              <th scope="col" width="100px;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            
                                <tr>
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $konten->deskripsi }}</td>
                                  <td align="center"><img src="{{ URL::to('/')}}/public/images/Tentang_Kami/{{$konten->gambar}}" alt="" width="80px" class="img-thumbnail"></td>
                                  <td>{{$konten->tampilkan}}</td>
                                  <td align="center">
                                    <a href="about_us/edit/{{$konten->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/about_us/hapus/{{$konten->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                  </td>
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