<!DOCTYPE html>
<html lang="en">
  
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" href="{{url('asset/img/Logo.png')}}" type="image/png" />
  <title>Shakeelamart - Login</title>

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

<body style="background-color:#BBBBBB;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5" style="background-color:white;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                  <img class="mb-4" src="{{url('asset/img/Logo.png')}}" style="width: 150px; height:150px;">
                  </div>
                  @if (session('status'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  @if (session('gagal'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{session('gagal')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  @endif
                <form class="user" action="/login" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input name="username" type="text" autofocus class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username..." autocomplete="off" value="{{old('username')}}">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" >Login</button>
                    <div class="text-center my-2">
                        <a class="small" href="{{ route('registrasi') }}">Buat Akun!</a>
                    </div>
                    <div class="text-center my-2">
                        <a class="small" href="/">Kembali Ke Halaman Utama</a>
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
