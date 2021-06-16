@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Report")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Report Produk</h1>
            <a href="{{route ('produk.cetak')}}" target="_blank" class=" btn btn-primary"><img src="{{ URL::to('/')}}/asset/img/pdf.png" alt="" width="30px"></td></a>
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
                              <th scope="col" width="45px;">#</th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Gambar</th>
                              <th scope="col">Dilihat</th>
                              
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            @foreach ($product as $konten)
                                <tr>
                                  <th scope="col">{{ $loop->iteration }}</th>
                                  <td>{{ $konten->nama_produk }}</td>
                                  <td align="center"><img src="{{ URL::to('/')}}/public/images/produk/{{$konten->gambar1}}" alt="" width="100px" class="img-thumbnail"></td>
                                  @if($konten->dilihat != null)
                                  <td>{{$konten->dilihat}}</td>
                                  @else
                                  <td>0</td>
                                  @endif
                                  
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