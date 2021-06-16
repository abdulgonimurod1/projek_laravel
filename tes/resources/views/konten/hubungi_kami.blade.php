@extends('halaman_utama.index')
@section('title', 'Shakeela Mart - Hubungi Kami')

@section('content')
<div class="padding" style="background-color: black; margin-top: 15px;"></div>

<div class="padding" style="background-color: black; margin-top: 15px;"></div>

<!-- Card -->

<div class="row justify-content-center">
  <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card">
        @foreach ($contact as $kontak )
        @if($kontak->tampilkan == "Y")
        <iframe src="{{$kontak->maps}}" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </iframe>
          <div class="card-body">
          <div class="col-md-8" style="display: inline; float:left; width:100%"> 
            <form method="POST" action="{{ url('message') }}" style="margin-top: 10px;">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
                <div class="form-row">
                  <div class="form-group col-md-5 col-sm-4 my-2">
                    <input type="text" class="form-control" id="inputnama" name="nama" placeholder="Nama">
                  </div>
                  <div class="form-group col-md-5 col-sm-4 my-2">
                    <input type="email" class="form-control" id="inputemail" name="email" placeholder="Email">
                  </div>
                </div>
              <div class="form-row">
                <div class="form-group col-md-5 col-sm-4 my-2">
                  <input type="text" class="form-control"  id="inputsubjek" name="subjek" placeholder="Subjek">
                </div>
                <div class="form-group col-md-5 col-sm-4 my-2">
                  <input type="text" class="form-control"  id="inputtelepom" name="telepon" placeholder="Telepon"  onkeypress="validate(event)">
                </div>
              </div>
              <div class="form-group" style="width:400px;">
                <textarea class="form-control" id="inputpesan"  name="pesan" rows="5" placeholder="Pesan"></textarea>
              </div>
              <button type="submit" class="btn btn-success">Kirim</button>
            </form>
          </div>
          <div class="col-md-5 col-sm-4" style=" position: relative; float: left; width:33.33333333%">
            
                  <address style="color: black">
                    <h4>{{$kontak->judul}}</h4>
                    <p>{{$kontak->alamat}}</p>
                    <p style="text-decoration: none"><span class="fas fa-home"></span> <a href="/">shakeelamart.id</a></p>
                    <p><i class="far fa-envelope"></i> {{$kontak->email}}</p>
                    <p><i class="fas fa-phone-alt"></i> {{$kontak->telepon}}</p>
                    <p><i class="fab fa-whatsapp"></i> {{$kontak->wa}}</p>
                  </address>
          </div>
      </div>
      @endif
    @endforeach
    </div>
  </div>
</div>


<div class="padding" style="background-color: grey; margin-top: 50px; margin-bottom: 50px;"></div>

@endsection 