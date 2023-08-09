@extends('frontend.frontend_master')
@section('title')
Product Single Page
@endsection
@section('main-content')
<!--banner-->
<div class="banner-top" style="margin-top:10px;">
   <div class="container">
      <h3 >Product Single Page</h3>
      <h4><a href="">Product</a><label>/</label>Single</h4>
      <div class="clearfix"> </div>
   </div>
</div>
<div class="single">
   <div class="container">
      <div class="single-top-main">
         <div class="col-md-5 single-top">
            <div class="single-w3agile">
               <div id="picture-frame">
                  <img src="{{ asset($product->thumbnail )}}" data-src="{{ asset($product->thumbnail) }}" alt="" class="img-responsive"/>
               </div>
               <script src="{{ asset('') }}frontend/js/jquery.zoomtoo.js"></script>
               <script>
                  $(function() {
                  	$("#picture-frame").zoomToo({
                  		magnify: 1
                  	});
                  });
               </script>
            </div>
         </div>
         <div class="col-md-7 single-top-left ">
            <div class="single-right">
               <h3>{{ $product->name }}</h3>
               <div class="pr-single">
                  <p class="reduced ">{{ $product->selling_price }} TK.</p>
               </div>
               <div class="block block-w3">
                  <div class="starbox small ghosting"> </div>
               </div>
               <p class="in-pa"> {!! $product->description !!} </p>
               <div class="add add-3">
                  <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="Wheat" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/si.jpg">Add to Cart</button>
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
         <div class="clearfix"> </div>
      </div>
   </div>
</div>
<!---->
<div class="content-top offer-w3agile">
   <div class="container ">
      <div class="spec ">
         <h3>Related Products</h3>
         <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
         </div>
      </div>
      <div class=" con-w3l wthree-of">

        @php
            $relatedProducts = App\Models\Product::where('category_id',$product->category_id)->orderBy('id','desc')->limit(4)->get();
        @endphp
        @foreach ( $relatedProducts as  $relatedProduct)
            <div class="col-md-3 pro-1">
                <div class="col-m">
                <a href="{{ url('/product/single',$relatedProduct->id) }}"  class="offer-img">
                    <img src="{{ asset($relatedProduct->thumbnail )}}" class="img-responsive" alt="">
                </a>
                <div class="mid-1">
                    <div class="women">
                        <p>{{ $relatedProduct->name }}</p>
                        <h6 style="margin:15px 0;">{{ $relatedProduct->selling_price  }} TK.</h6>
                    </div>
                    <div class="add">
                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="5" data-name="Lays" data-summary="summary 5" data-price="0.70" data-quantity="1" data-image="images/of4.png">Add to Cart</button>
                    </div>
                </div>
                </div>
            </div>
         @endforeach
      </div>
   </div>
</div>
@endsection
