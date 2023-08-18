@extends('frontend.frontend_master')
@section('title')
Childcategory Wise Product View
@endsection

@section('main-content')
<!--banner-->
<div class="banner-top" style="margin-top:10px;">
   <div class="container">
      <h3 >Childcategory Wise Product</h3>
      <h4><a href="">Childcategory</a><label>/</label>Product</h4>
      <div class="clearfix"> </div>
   </div>
</div>

<!---->
<div class="content-top offer-w3agile">
   <div class="container ">
      <div class="spec ">
         <h4>Childcategory Name:</h4>
         <p style="margin-bottom: 10px;">{{ $childcategory->childcategory_name }}</p>
         <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
         </div>
      </div>
      <div class=" con-w3l wthree-of">

           @if (count($products)>0)
           @foreach ( $products as  $product)
           <a href="{{ url('/product/single',$product->id) }}"  class="offer-img">
                <div class="col-md-3 pro-1">
                    <div class="col-m">

                            <img src="{{ asset($product->thumbnail )}}" class="img-responsive" alt="">

                            <div class="mid-1">
                                <div class="women">
                                    <p>{{ $product->name }}</p>
                                    <h6 style="margin:15px 0;">{{ $product->selling_price  }} TK.</h6>
                                </div>
                            </div>

                    </div>
                </div>
            </a>
           @endforeach
           @else
              <h3 class="text-danger text-center">No Product Found.........</h3>
           @endif

      </div>
   </div>
</div>
@endsection
