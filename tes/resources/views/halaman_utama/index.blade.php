<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{url('asset/img/Logo.png')}}" type="image/png" />
  <title>@Yield('title')</title>

  @include('layouts.style')

</head>
<body style="background-color: 	#ffffffd2">
@include('layouts.header')

    @yield('content')

@include('layouts.footer')

@include('layouts.script')
</html>