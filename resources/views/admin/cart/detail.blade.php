@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Order Detail")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Order Detail</h6>
                </div>
                <div class="card-body">
                    <form>
                        @foreach($cart as $c)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" Value"{{$c->kode_pesanan}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" Value"{{$c->user()->name}}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    
@endsection