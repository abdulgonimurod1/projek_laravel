<footer class="footer-area section_gap mt-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 single-footer-widget mt-1">
            <a class="navbar-brand logo_h" href="{{url('/')}}">
                <img src="{{url('asset/img/header.png')}}" alt="" style="width: 120px; height: auto;"/>
            </a>
            <p></p>
            <ul>
                <li><a href="https://goo.gl/maps/8jm7Fu8mB5ibFt2B7" target="_blank">Jl. Ahmad Yani, Wonocolo, Surabaya Selatan</a></li>
            </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget mt-1">
          <h4>Menu Utama</h4>
          <ul>
            <li><a href="/">Beranda</a></li>
            <li><a href="{{url('/shop_page')}}">Belanja</a></li>
            <li><a href="{{url('/hubungi_kami')}}">Hubungi Kami</a></li>
            <li><a href="{{url('/tentang_kami')}}">Tentang Kami</a></li>
            <li><a href="{{url('/cara_pesan')}}">Cara Pemesanan</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget mt-1">
          <h4>Kategori</h4>
          <ul>
            @foreach ( $cg as $kategori )
            <li><a href="/search_kategori/{{ $kategori->id_kategori }}">{{$kategori->nama_kategori}}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 single-footer-widget mt-1">
          <h4>Hubungi Kami</h4>
          <ul>
            @foreach ($contact as $kontak)
                
            <li><b style="font-size: 17px; color: grey">{{$kontak->judul}}</b></li>
            <li>{{$kontak->alamat}}</li>
            <li><i class="fas fa-phone-alt"></i> {{$kontak->telepon}}</li>
            <li><i class="far fa-envelope"></i><a href="mailto:{{$kontak->email}}" target="_blank"> {{$kontak->email}}</a></li>
            <li><i class="fab fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=6289463735362" target="_blank"> {{$kontak->wa}}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="col-lg-2 col-md-12 single-footer-widget mt-1">
            <h4>Sosmed</h4>
            <ul>
                @foreach ($sosmed as $item )
                  @if ($item->tampilkan == "ya")
                  <li>
                        <a href="{{$item->link}}" target="_blank">
                            <img src="{{ URL::to('/public/images/sosmed/' . $item->gambar) }}" style="width:50px;height:auto">
                            <span>{{ $item->nama_sosmed }}</span>
                        </a>
                  </li>
                  @endif
                @endforeach
            </ul>
        </div>
        <!-- <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
              method="get" class="form-inline">
              <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Your Email Address '" required="" type="email">
              <button class="click-btn btn btn-default" style="margin-right:-300px;">Subscribe</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div> -->
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-12 col-md-12" style="text-align:left">
            &copy;<script>document.write(new Date().getFullYear());</script> Shakeela Mart Copyright
        </p>
      </div>
    </div>
  </footer>