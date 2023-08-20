<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<!-- for-mobile-apps -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<meta name="csrf-token" content="{{ csrf_token() }}">



<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('/') }}frontend/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{ asset('/') }}frontend/css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="{{ asset('/') }}frontend/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('/') }}frontend/js/move-top.js"></script>
<script type="text/javascript" src="{{ asset('/') }}frontend/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="{{ asset('/') }}frontend/css/font-awesome.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="{{ asset('/') }}frontend/js/jstarbox.js"></script>
	<link rel="stylesheet" href="{{ asset('/') }}frontend/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					}
				})
			});
		});
		</script>

{{-- toastr notification --}}
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
  alpha/css/bootstrap.css" rel="stylesheet"> --}}

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <link rel="stylesheet" type="text/css"
  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  {{-- toastr notification end --}}


  {{-- another toaster js for ajax success message --}}
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  {{-- another toaster js for ajax success message end --}}
<!---//End-rate---->

<style>
    body{
        margin:0 auto;
    }
</style>

</head>
<body>

@include('frontend.partials.header')
  <!---->


<!-- Carousel
    ================================================== -->

<!-- /.carousel -->


@yield('main-content')
<!--footer-->
@include('frontend.partials.footer')
<!-- //footer-->

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear'
			};
		*/
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="{{ asset('/') }}frontend/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="{{ asset('/') }}frontend/js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>

  {{-- toastr notification --}}
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
{{-- toastr notification end --}}

{{-- another toastr js for ajax success message --}}
{{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
{{-- another toastr js for ajax success message end --}}


<script>

    $(document).ready(function(){
       $(document).on('click','#deleteCartItem',function(){
           let rowId = $(this).data('id');


          // alert(rowId);

           var data = {
               _token: '{{csrf_token()}}',
               'rowId':rowId,

               }

           $.ajax({
               url:'/cart-item/delete',
               method:'GET',
               data:data,


               success:function(response){
                   $('.cartTable').load(location.href+' .cartTable');
                   $('.cartCount').load(location.href+' .cartCount');
                   if(response.products==0){
                    $('.cartTable').hide();
                    $('.cartProductempty').show();
                    //window.location.reload();

                   }


               },
           })
       })
    });

</script>


{{-- add to card from wishlist --}}
<script>
    $(document).ready(function(){
       $(document).on('click','.addTocart',function(){
           let rowId = $(this).data('id');
           var quantity = $(this).closest(".wishlistpage").find('.quantity').val();
           var color = $(this).closest(".wishlistpage").find('.color').val();
           var size = $(this).closest(".wishlistpage").find('.size').val();

          //alert(color);

           var data = {
               _token: '{{csrf_token()}}',
               'rowId':rowId,
               'quantity':quantity,
               'color':color,
               'size':size,

               }

           $.ajax({
               url:'/addTocart-from/wishlist',
               method:'POST',
               data:data,


               success:function(response){
                $('.cartCount').load(location.href+' .cartCount');
                //toastr start
                Command: toastr["success"](response.status)

                toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
                //toastr start end


               },
           })
       })
    });

 </script>
{{-- add to card from wishlist end --}}


</body>
</html>
