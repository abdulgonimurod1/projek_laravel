@extends('halaman_utama.index')
@section('title', 'Shakeela Mart - Tentang Kami')

@section('content')
<div class="container-fluid" style="padding: 0%">
     
  @forelse($about as $item)
  <div class="banner">
    <img  src="{{ URL::to('/')}}/public/images/Tentang_Kami/{{ $item->gambar }}"  alt="" class="d-block w-100" height="400px">
  </div>
  <div class="container mb-4 mt-4" style="background-color: white;">
    <div class="bag1" style="text-align:center; padding:0 20%;">
      <div class="head1">
        <br>
        <h3><b>SHAKEELA'S MART</b></h3>
      </div>
      <p>
        {{ $item->deskripsi }}
      </p>
    </div>
    @empty
    @endforelse
    
    <div class="bag2" style="text-align:center; padding:0 5%;">
      @foreach ($owner as $item)
      @if ($item->tampilkan == "ya")
      <div class="head1">
        <br>
        <h3><b>About Owner's</b></h3>
      </div>
      <br>
      <div class="carousel" style="margin-top: 15px">
        <div id="carousel_2" class="owl-carousel">
          @foreach ($owner as $item)
            <div class="row">
              <div class="col-lg-4">
                <img src="{{ URL::to('/')}}/public/images/Owner/{{$item->gambar }}" alt="" style="width:100%; heihgt:auto;border-radius:100%">
              </div>
              <div class="col-lg-8" style="text-align: justify;color:#000">
                <h4 style="text-align: left">{{ $item->owner }}</h4>
                {{ $item->deskripsi }}
              </div>
            </div>
          @endforeach
        </div>
      </div>
          @endif
        @endforeach      
      </div>

  </div>
</div>
@endsection