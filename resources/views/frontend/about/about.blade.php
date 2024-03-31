@extends('frontend.frontend_master')
@section('title')
About Us
@endsection

@section('main-content')
  <!--banner-->
<div class="banner-top" style="margin-top: 20px;">
	<div class="container">
		<h3 >About Us</h3>
		<h4><a href="/">Home</a><label>/</label>About Us</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--about-->
<div class="container">
    <div  class="about">
        <div class="spec ">
            <h3>About Us</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
        </div>

        <div class="col-md-4 about-right">
        <img class="img-responsive" src="{{ asset('frontend/images/ab.jpg') }}" alt="">
        </div>
        <div class="col-md-4 about-left">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse laoreet sem sit amet dolor luctus pellentesque. Pellentesque eleifend tellus at interdum elementum. Nam egestas molestie elit. Vivamus sed accumsan quam, a mollis magna. Nam aliquet eros eget sapien consequat tincidunt at vel nibh. Duis ut turpis mi. Duis nec scelerisque urna, sit amet varius arcu. Aliquam aliquet sapien quis mauris semper suscipit. Maecenas pharetra dapibus posuere. Praesent odio sem.  </p>
        </div>
        <div class="col-md-4 about-right">
        <img class="img-responsive" src="{{ asset('frontend/images/ab1.jpg') }}" alt="">
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
<!--//about-->


@endsection

{{-- js for keep scrol position and page refresh --}}
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
