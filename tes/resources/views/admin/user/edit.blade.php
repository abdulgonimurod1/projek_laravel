@extends('layout_admin.master')
@section('title', "Shakeela's Mart - Edit User")
    
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                </div>
                <div class="card-body">
                    <form action="/user/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name">
                                @error('name')    
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" name="email">
                                @error('email')    
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" class="form-control" name="username" value="{{$user->username}}">
                            @error('username')    
                            <div class="invalid-feedback">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">role</label>
                            <select type="text" class="form-control @error('role') is-invalid @enderror" name="role" id="role" autocomplete="off" value="{{old('role')}}">
                                <option selected value="{{$user->role}}">{{$user->role}}</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                                @error('role')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                          <div class="form-group">
                            <label for="is_active">Aktif</label>
                            <select type="text" class="form-control @error('is_active') is-invalid @enderror" name="is_active" id="is_active" autocomplete="off" value="{{old('is_active')}}">
                                <option selected value="{{$user->is_active}}">{{$user->is_active}}</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak aktif">tidak aktif</option>
                            </select>
                                @error('is_active')    
                                <div class="invalid-feedback">{{$message}}</div> 
                                @enderror
                          </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('user.index')}}" class="btn btn-warning">Batal</a>
                    </form>
                </div>
            </div>

        </div>
</div>
    
@endsection