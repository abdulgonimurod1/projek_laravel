@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Pengunjung")
@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengunjung</h1>
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
                              <th class="align-middle" scope="col">Pengunjung</th>
                              <th class="align-middle" scope="col">Tanggal</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($view as $v)
                            @if ($v->id != 1)
                            <tr align="center">
                              <th scope="col">{{ $loop->iteration }}</th>
                              <td scope="col">{{$v->view}}</td>
                              <td scope="col">{{$v->created_at}}</td>
                            </tr>
                              @endif
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