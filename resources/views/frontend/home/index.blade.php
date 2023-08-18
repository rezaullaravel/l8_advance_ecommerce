@extends('frontend.frontend_master')
@section('title')
Home page
@endsection
@section('main-content')
<style>
    .product {
    padding: 27px 6em !important;
}
</style>
@include('frontend.partials.slider')
<!--content-->
<div class="content-top ">
   <div class="container ">
      <div class="spec ">
         <h3>Product's Category</h3>
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
                @foreach ( $categoryWiseProducts as  $product)
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
               </div>
            </div>
            @endforeach
            {{-- categorywise product show end --}}
         </div>
         {{-- end tab-content --}}
      </div>
   </div>
</div>
</div>
<!--content-->
<div class="product" style="margin-top: 52px;">
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
        @foreach ( $featuredProducts as  $product)
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
      </div>
   </div>
</div>
<!--content-->
<div class="product">
   <div class="container">
      <div class="spec ">
         <h3>Popular Products</h3>
         <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
         </div>
      </div>


      <div class="con-w3l">

        @foreach ( $popularProducts as  $product)
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
      </div>
      {{-- popular product show loop end --}}
   </div>
</div>
@endsection
