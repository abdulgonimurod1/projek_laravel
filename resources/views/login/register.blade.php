<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  {{-- Title --}}
  <link rel="icon" href="{{url('asset/img/Logo.png')}}" type="image/png" />
  <title>Shakeela Mart - Registrasi</title>

 <!-- Custom fonts for this template-->
 <link href="{{ asset ('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

 <!-- Custom styles for this template-->
 <link href="{{asset ('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <style>
    h1 {
    position: relative;
    display: inline-block;
    font-size: 9rem;
    text-transform: uppercase;
    color: #244D49;
    text-shadow: 2px 2px 0px #D7DACC, 3px 3px 0px rgba(0, 0, 0, 0.1);
    }
  </style> 
</head>

<body style="background-color:#BBBBBB">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Daftar Akun</h1>
                  </div>
                <form class="user" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <div class="col-sm-12 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Nama Lengkap" autocomplete="off">
                        @error('name')    
                        <div class="invalid-feedback">{{$message}}</div> 
                        @enderror
                    </div>
                  </div>
                    <div class="form-group row">
                      <div class="col-sm-12 mb-3 mb-sm-0">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="Masukan Email" autocomplete="off">
                        @error('email')    
                        <div class="invalid-feedback">{{$message}}</div> 
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username')}}" placeholder="Masukan Username" autocomplete="off">
                        @error('username')    
                        <div class="invalid-feedback">{{$message}}</div> 
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password"  name="password" placeholder="Password">
                              @error('password')    
                              <div class="invalid-feedback">{{$message}}</div> 
                              @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                              @error('password_confirmation')    
                              <div class="invalid-feedback">{{$message}}</div> 
                              @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" style="font-family: Georgia, 'Times New Roman', Times, serif">  
                      Buat Akun
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="/login">Sudah Punya Akun? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset ('admin/vendor/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset ('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset ('admin/vendor/jquery-easing/jquery.easing.min.js') }} "></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset ('admin/js/sb-admin-2.min.js') }} "></script>

</body>

</html>
