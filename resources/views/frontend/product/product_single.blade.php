@extends('frontend.frontend_master')
@section('title')
Product Single Page
@endsection

<style>
    .checked {
  color: orange;
}
</style>
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
               <div id="picture-frame" style="height: 260px;">
                  <img src="{{ asset($product->thumbnail )}}" data-src="{{ asset($product->thumbnail) }}" alt="" class="img-responsive"/>
               </div>
               <script src="{{ asset('/') }}frontend/js/jquery.zoomtoo.js"></script>
               <script>
                  $(function() {
                  	$("#picture-frame").zoomToo({
                  		magnify: 1
                  	});
                  });
               </script>
            </div>
            <div style="margin-top: 3px;">
                @foreach ($product->productMultiImage as $image)
                  <img src="{{ asset($image->product_image) }}" alt="" width="80" style="border:1px solid #e7dcdc;">

                @endforeach
            </div>
         </div>
         <div class="col-md-7 single-top-left ">
            <div class="single-right">
                <p>{{ $product->category->category_name }}@if ($product->subcategory)
                    {{'>'. $product->subcategory->subcategory_name }}
                @else

                @endif
                @if ($product->childcategory)
                {{'>'. $product->childcategory->childcategory_name }}

                @else

                @endif</p>
               <h3 style="margin-top: 7px">{{ $product->name }}</h3>
               <div class="pr-single">
                  <p class="reduced ">{{ $product->selling_price }} TK.</p>
               </div>
               <form action="{{ url('/addTo/cart') }}" method="POST">
                @csrf
               <div class="form-group">
                  <div class="row">
                      <div class="col-md-3">
                        <label>Size</label>
                        <select name="size" id="" class="form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                      </div>

                      <div class="col-md-3">
                        <label>Color</label>
                        <select name="color" id="" class="form-control" required>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3" style="margin-top: 14px">
                        <label>Quantity</label>
                        <input type="number" name="quantity" min="1" value="1" class="form-control" required>

                      </div>
                  </div>
               </div>

             <p></p>
               <div class="add add-3">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="Wheat" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/si.jpg">Add to Cart</button>
                 </form>

                 <form action="{{ url('/product/wishlist/store') }}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="Wheat" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/si.jpg">Add to Wishlist</button>
                 </form>
                 @if (Session('info-message'))
                     <div class="alert alert-danger" style="margin-top: 2px;">
                          <p>{{ Session::get('info-message') }}</p>
                     </div>
                 @endif
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container">
    <div class="row">
       <div class="col-md-8" style="margin-left: 13px;
       margin-top: 26px;">
           <h4 style="background: #f6f0f080;">Product Description</h4>
           <p>{!! $product->description !!}</p>
       </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
       <div class="col-md-8" style="margin-left: 13px;
         margin-top: 26px;">
           <h4 style="background: #f6f0f080;">Give a review of {{ $product->name }} product</h4>



           @if (Session('info-sms'))
               <div class="alert alert-danger" role="alert">
                  {{ Session::get('info-sms') }}
               </div>
           @endif


                <form action="{{ url('product/review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group" style="margin-top: 17px;">
                        <textarea name="review" id=""  rows="7" placeholder="Write your review" class="form-control"></textarea>
                        @error('review')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group" style="margin-top: 17px;">
                        <select name="rating_point" id="" class="form-control">
                            <option selected disabled>Rating Point</option>
                            <option value="1">Rating Point One</option>
                            <option value="2">Rating Point Two</option>
                            <option value="3">Rating Point Three</option>
                            <option value="4">Rating Point Four</option>
                            <option value="5">Rating Point Five</option>
                        </select>
                        @error('rating_point')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <button type="submit"  class="btn btn-success">Submit Review</button>
                    </div>
                </form>
       </div>

       <div class="col-md-3" style="margin-top: 26px;">
        <h4 style="background: #f6f0f080;">Total Reviews</h4>
        <div>
            @php
                $fivestar_reviews = App\Models\Review::where('product_id',$product->id)->where('rating_point',5)->count();
            @endphp
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span>({{   $fivestar_reviews }})</span>
        </div>

        <div>
            @php
              $fourstar_reviews = App\Models\Review::where('product_id',$product->id)->where('rating_point',4)->count();
            @endphp
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span>({{  $fourstar_reviews }})</span>
        </div>

        <div>
            @php
              $threestar_reviews = App\Models\Review::where('product_id',$product->id)->where('rating_point',3)->count();
            @endphp
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span>{{ $threestar_reviews }}</span>
        </div>

        <div>
            @php
                $twostar_reviews = App\Models\Review::where('product_id',$product->id)->where('rating_point',2)->count();
            @endphp
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span>({{ $twostar_reviews  }})</span>
        </div>

        <div>
            @php
                $onestar_reviews = App\Models\Review::where('product_id',$product->id)->where('rating_point',1)->count();
            @endphp
            <span class="fa fa-star checked"></span>
            <span>({{ $onestar_reviews }})</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
       <div class="col-md-8" style="margin-left: 13px;
       margin-top: 26px;">
           <h4 style="background: #f6f0f080;">All review of {{ $product->name }} product({{ count($product_reviews) }})</h4>

        @foreach ($product_reviews as $review)
          <div style="margin-top:12px; background:#f6f0f080; margin-bottom:30px;">
            <p><?php echo $review->user->name; ?></p>
            <p><?php echo $review->created_at; ?></p>
            <p>{{ $review->review }}</p>
            @if ($review->rating_point == 5)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            @endif

            @if ($review->rating_point == 4)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            @endif

            @if ($review->rating_point == 3)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            @endif

            @if ($review->rating_point == 2)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            @endif

            @if ($review->rating_point == 1)
                <span class="fa fa-star checked"></span>
            @endif
          </div>
        @endforeach



       </div>
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

{{-- js refresh page and keep scroll position --}}
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
@endsection
