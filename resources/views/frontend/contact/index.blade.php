@extends('frontend.frontend_master')
@section('title')
Contact Us
@endsection

@section('main-content')
  <!--banner-->
<div class="banner-top" style="margin-top: 20px;">
	<div class="container">
		<h3 >Contact</h3>
		<h4><a href="/">Home</a><label>/</label>Contact</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!-- contact -->
<div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Contact</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
		</div>
		<div class=" contact-w3">
			<div class="col-md-2">

			</div>
			<div class="col-md-8  contact-left">
                @if(session('sms'))
                    <div class="alert alert-success">
                        <p class="text-center">{{ Session::get('sms') }}</p>
                    </div>
                 @endif

				<h4>Contact Information</h4>

				<div id="container">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">

						<div class="resp-tabs-container hor_1">
							<div>
								<form action="{{ route('insert.message') }}" method="post">
                                    @csrf
									<div class="form-group">
                                        <input type="text" name="name" placeholder="Enter your name" class="form-control" required>
                                    </div>

									<div class="form-group">
                                        <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="message" placeholder="Enter your message" class="form-control" required rows="7"></textarea>
                                    </div>
									<input type="submit" value="Submit" >
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

            <div class="col-md-2">

			</div>



		<div class="clearfix"></div>
	</div>
	</div>
</div>
<!-- //contact -->


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
