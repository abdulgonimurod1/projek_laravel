@extends('halaman_utama.index')
@section('title', 'Shakeela Mart - Cara Pemesanan')

@section('content')
<link rel="stylesheet" href="{{url('css/custom.css')}}">
<div class="padding" style="background-color: black; margin-top: 15px;"></div>

<div class="padding" style="background-color: black; margin-top: 15px;"></div>

<!-- Card -->
<h1>Cara Pemesanan di Shakeela's Mart</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="accordion" id="accordionExample">
              @foreach($cara as $cp)
                <div class="card">
                  <div class="card-header" id="heading{{ $cp->id }}">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $cp->id }}" aria-expanded="true" aria-controls="collapse{{ $cp->id }}">
                            <img id="img-caper" alt="{{$cp->judul}}" style="width: 5%; height:auto;" src="{{ URL::to('/') }}/public/images/cara_pemesanan/{{$cp->gambar}}" alt="{{ $cp->gambar }}" class="rounded-circle"> {{$cp->judul}}
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapse{{ $cp->id }}" class="collapse" aria-labelledby="heading{{ $cp->id }}" data-parent="#accordionExample">
                    <div class="card-body">
                        <h3>{{ $cp->judul }}</h3>
                        <hr>
                        <ul class="list-group" style="color: #000">
                          @if( !empty($cp->langkah1))
                            <li class="list-group-item">{{$cp->langkah1}}</li>
                          @endif

                          @if( !empty($cp->langkah2))
                            <li class="list-group-item">{{$cp->langkah2}}</li>
                          @endif
                          
                          @if( !empty($cp->langkah3))
                            <li class="list-group-item">{{$cp->langkah3}}</li>
                          @endif

                          @if( !empty($cp->langkah4))
                            <li class="list-group-item">{{$cp->langkah4}}</li>
                          @endif
                          
                          @if( !empty($cp->langkah5))
                            <li class="list-group-item">{{$cp->langkah5}}</li>
                          @endif

                          @if( !empty($cp->langkah6))
                            <li class="list-group-item">{{$cp->langkah6}}</li>
                          @endif
                          
                          @if( !empty($cp->langkah7))
                            <li class="list-group-item">{{$cp->langkah7}}</li>
                          @endif

                          @if( !empty($cp->langkah8))
                            <li class="list-group-item">{{$cp->langkah8}}</li>
                          @endif

                          @if( !empty($cp->langkah9))
                            <li class="list-group-item">{{$cp->langkah9}}</li>
                          @endif
                          
                          @if( !empty($cp->langkah10))
                            <li class="list-group-item">{{$cp->langkah10}}</li>
                          @endif
                        </ul>
                    </div>
                  </div>
                </div>
              @endforeach
                {{-- <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <img id="img-caper" alt="Driver Gojek" style="width: 8%; height:auto;" src="https://i.pinimg.com/originals/05/7b/27/057b274c134bcf92ac151758478949b3.png">
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <h3>Cara Pemesanan via Shopee</h3>
                        <hr>
                        <ul class="list-group" style="color: #000">
                            <li class="list-group-item">1. Cras justo odio</li>
                            <li class="list-group-item">2. Dapibus ac facilisis in</li>
                            <li class="list-group-item">3. Morbi leo risus</li>
                            <li class="list-group-item">4. Porta ac consectetur ac</li>
                            <li class="list-group-item">5. Vestibulum at eros</li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <img id="img-caper" alt="Driver Gojek" style="width: 10%; height:inherit;" src="https://technobusiness.id/wp-content/uploads/2019/06/Lazada-Baru.png">
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <h3>Cara Pemesanan via Lazada</h3>
                        <hr>
                        <ul class="list-group" style="color: #000">
                            <li class="list-group-item">1. Cras justo odio</li>
                            <li class="list-group-item">2. Dapibus ac facilisis in</li>
                            <li class="list-group-item">3. Morbi leo risus</li>
                            <li class="list-group-item">4. Porta ac consectetur ac</li>
                            <li class="list-group-item">5. Vestibulum at eros</li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <img id="img-caper" alt="Driver Gojek" style="width: 15%; height:auto;" src="https://www.sciecomm.com/wp-content/uploads/2019/04/logo-tokopedia-png-7.png">
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <h3>Cara Pemesanan via Tokopedia</h3>
                        <hr>
                        <ul class="list-group" style="color: #000">
                            <li class="list-group-item">1. Cras justo odio</li>
                            <li class="list-group-item">2. Dapibus ac facilisis in</li>
                            <li class="list-group-item">3. Morbi leo risus</li>
                            <li class="list-group-item">4. Porta ac consectetur ac</li>
                            <li class="list-group-item">5. Vestibulum at eros</li>
                        </ul>
                    </div>
                  </div>
                </div> --}}
            </div>
        </div>
    </div>

</div>

<div class="padding" style="background-color: grey; margin-top: 50px; margin-bottom: 50px;"></div>

@endsection 