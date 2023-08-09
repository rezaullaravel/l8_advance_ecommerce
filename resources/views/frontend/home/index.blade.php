@extends('frontend.frontend_master')


@section('title')
Home page
@endsection

@section('main-content')
@include('frontend.partials.slider')
<!--content-->
<div class="content-top ">
	<div class="container ">
		<div class="spec ">
			<h3>Special Offers</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
			<div class="tab-head ">
				<nav class="nav-sidebar">
					<ul class="nav tabs ">
                        @foreach ($categories as $category)
					   <li ><a href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name }}</a></li>
                      @endforeach
					</ul>
				</nav>
				<div class=" tab-content tab-content-t ">
					<div class="tab-pane active text-style">
						<div class=" con-w3l">
                        {{-- product show --}}
                            @foreach ($products as $product)
                            <div class="col-md-3 m-wthree" style="margin-top:25px;">

								<div class="col-m">
									<a href="{{ url('/product/single', $product->id) }}"   class="offer-img">
										<img src="{{ asset($product->thumbnail) }}" class="img-responsive" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
                                            <p>{{ $product->name }}</p>
                                           <h4 style="margin:10px 0">{{ $product->selling_price }} TK.</h4>


										</div>
										<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1">Add to Cart</button>
										</div>

									</div>
								</div>

							</div>
                            @endforeach
                       {{-- product show end--}}


						 </div>


					</div>


                    {{-- categorywise product show --}}
                     @foreach ($categories as $category)
                    <div class="tab-pane  text-style" id="category{{ $category->id }}">
                       @php
                         $categoryWiseProducts = App\Models\Product::where('category_id',$category->id)->orderBy('id','desc')->get();
                       @endphp

                            <div class=" con-w3l">
                                  @foreach ($categoryWiseProducts  as $product)
                                <div class="col-md-3 m-wthree" style="margin-top:25px;">
                                    <div class="col-m">
                                        <a href="{{ url('/product/single', $product->id) }}"  class="offer-img">
                                            <img src="{{ asset($product->thumbnail) }}" class="img-responsive" alt="">
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                                <p>{{ $product->name }}</p>
                                               <h4 style="margin:10px 0">{{ $product->selling_price }} TK.</h4>


                                            </div>
                                            <div class="add">
                                            <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">Add to Cart</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

					</div>
                    @endforeach
                    {{-- categorywise product show end --}}
				</div>{{-- end tab-content --}}
			</div>

	</div>
	</div>
	</div>

<!--content-->
<div class="content-mid">
	<div class="container">

		<div class="col-md-4 m-w3ls">
			<div class="col-md1 ">
				<a href="kitchen.html">
					<img src="{{asset('/')}}frontend/images/co1.jpg" class="img-responsive img" alt="">
					<div class="big-sa">
						<h6>New Collections</h6>
						<h3>Season<span>ing </span></h3>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority </p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls1">
			<div class="col-md ">
				<a href="hold.html">
					<img src="{{asset('/')}}frontend/images/co.jpg" class="img-responsive img" alt="">
					<div class="big-sale">
						<div class="big-sale1">
							<h3>Big <span>Sale</span></h3>
							<p>It is a long established fact that a reader </p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls">
			<div class="col-md2 ">
				<a href="kitchen.html">
					<img src="{{asset('/')}}frontend/images/co2.jpg" class="img-responsive img1" alt="">
					<div class="big-sale2">
						<h3>Cooking <span>Oil</span></h3>
						<p>It is a long established fact that a reader </p>
					</div>
				</a>
			</div>
			<div class="col-md3 ">
				<a href="hold.html">
					<img src="{{asset('/')}}frontend/images/co3.jpg" class="img-responsive img1" alt="">
					<div class="big-sale3">
						<h3>Vegeta<span>bles</span></h3>
						<p>It is a long established fact that a reader </p>
					</div>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--content-->


<!--content-->
	<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Featured Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>


				<div class="con-w3l">

                    @foreach ($featuredProducts as $product)


                        <div class="col-md-3 pro-1">
                            <div class="col-m">
                               <a href="{{ url('/product/single', $product->id) }}" class="offer-img">
                                    <img src="{{ asset($product->thumbnail) }}" class="img-responsive"  alt="">
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <p><a href="">{{ $product->name }}</a></p>
                                    </div>

                                    <div class="women">
                                        <h6 style="margin:20px 0;"><a href="single.html">{{ $product->selling_price }} TK.</a></h6>
                                    </div>

                                        <div class="add add-2">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="{{asset('/')}}frontend/images/of16.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
				</div>
		</div>
	</div>
@endsection
