  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  {{-- <script src="{{url('asset/js/jquery-3.2.1.min.js')}}"></script> --}}
  {{-- <script src="{{url('asset/js/popper.js')}}"></script> --}}
  <script src="{{url('asset/js/bootstrap.min.js')}}"></script>
  <script src="{{url('asset/js/stellar.js')}}"></script>
  <script src="{{url('asset/vendors/lightbox/simpleLightbox.min.js')}}"></script>
  <script src="{{url('asset/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{url('asset/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{url('asset/vendors/isotope/isotope-min.js')}}"></script>
  <script src="{{url('asset/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('asset/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{url('asset/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
  <script src="{{url('asset/vendors/counter-up/jquery.counterup.js')}}"></script>
  <script src="{{url('asset/js/mail-script.js')}}"></script>
  <script src="{{url('asset/js/theme.js')}}"></script>
  <script src="{{url('/js/bootstrap.min.js')}}"></script>
  <script src="{{url('/js/bootstrap.bundle.js')}}"></script>
  <script src="{{url('/js/jquery-3.5.1.slim.min.js')}}"></script>
  <script src="{{url('/js/popper.min.js')}}"></script>


  <!-- Bootstrap core JavaScript-->

  <script src="{{ url('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('admin/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ url('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('admin/js/demo/datatables-demo.js')}}"></script>

    <!-- simplelens -->
    <script src="{{url('simplelens/jquery.simpleLens.js')}}"></script>

    <script src="{{url('carousel/owl.carousel.min.js')}}"></script>
  
    <script src="{{url('js/sweetalert.min.js')}}"></script>
    <script>
      $("#carousel_1").owlCarousel({
        loop:true,
        nav:false,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            },
            2000:{
                items:6
            }
        }
    })
    </script>
    <script>
    $("#carousel_produk_baru").owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            },
            2000:{
                items:6
            }
        }
    })
  </script>
    <script>
        $("#produk_carousel").owlCarousel({
            loop:false,
            margin:10,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                },
                2000:{
                    items:6
                }
            }
        })
      </script>
    <script>
        $("#carousel_2").owlCarousel({
          loop:false,
          margin:10,
          responsiveClass:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:2
              },
              2000:{
                  items:5
              }
          }
      })
    </script>
    <script>
        function validate(evt) {
          var theEvent = evt || window.event;
        
          // Handle paste
          if (theEvent.type === 'paste') {
              key = event.clipboardData.getData('text/plain');
          } else {
          // Handle key press
              var key = theEvent.keyCode || theEvent.which;
              key = String.fromCharCode(key);
          }
          var regex = /[0-9]|\./;
          if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
        }
    </script>

